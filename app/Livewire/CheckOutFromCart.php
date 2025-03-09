<?php

namespace App\Livewire;

use App\Enums\PaymentStatus;
use App\Enums\PaymentType;
use App\Models\AddToCart;
use App\Models\BookOrder;
use App\Models\Setting;
use App\Models\ShippingArea;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckOutFromCart extends Component
{
    public $books;
    public $subTotal;
    public $tax;
    public $total;
    public $bookPrices = [];
    public $shippingAreas;
    public $shippingFee = 0;
    public $selectedShippingArea;
    public $address;
    public $selectedAddress;
    public $showEnterNewAddress = false;
    public $paymentType;
    public $cash;
    public $visa;

    protected $listeners =
    [
        'totalUpdated' => 'updateTotal',
        'bookRemoved' => 'removeBook',
        'bookPriceAfterDiscount' => 'bookPriceAfterDiscount' //From EnterDiscountCode Component
    ];

    public function mount()
    {
        foreach ($this->books as $book) {
            $originalPrice = $book->price;
            $priceAfterDiscount = $originalPrice;
            $appliedDiscount = 0;

            if ($book->discountable_type == 'App\Models\FlashSale' && \Carbon\Carbon::now() >= $book->discountable->date) {
                $appliedDiscount = ($originalPrice * $book->discountable->percentage) / 100;
                $priceAfterDiscount = $originalPrice - $appliedDiscount;
            }

            $this->bookPrices[$book->id] = [
                'book_id'              => $book->id,
                'original_price'       => $originalPrice,
                'price_after_discount' => $priceAfterDiscount,
                'applied_discount'     => $appliedDiscount,
                'quantity'             => 1
            ];
        }
        $this->subTotal = array_sum(array_column($this->bookPrices, 'price_after_discount'));
        $this->tax = Setting::first()->value('tax_percentage') * ($this->subTotal / 100);
        $this->total = $this->subTotal + $this->tax;
        $this->shippingAreas = ShippingArea::get();
        $this->cash = PaymentType::Cash;
        $this->visa = PaymentType::Visa;
    }

    //From EnterDiscountCode Component
    public function bookPriceAfterDiscount($bookId, $discountAmount)
    {
        $originalPrice = $this->bookPrices[$bookId]['original_price'];
        $this->bookPrices[$bookId]['applied_discount'] = $discountAmount;
        $this->bookPrices[$bookId]['price_after_discount'] = $originalPrice - $discountAmount;
    }

    public function updateTotal($bookId, $quantity, $price)
    {
        $this->bookPrices[$bookId]['quantity'] = $quantity;
        $this->bookPrices[$bookId]['price_after_discount'] = $price * $quantity;
        $this->subTotal = array_sum(array_column($this->bookPrices, 'price_after_discount'));
        $this->tax = Setting::first()->value('tax_percentage') * ($this->subTotal / 100);
        $this->total = $this->subTotal + $this->tax + $this->shippingFee;
    }

    public function removeBook($bookId)
    {
        unset($this->bookPrices[$bookId]);
        $this->subTotal = array_sum(array_column($this->bookPrices, 'price_after_discount'));
        $this->tax = Setting::first()->value('tax_percentage') * ($this->subTotal / 100);
        $this->total = $this->subTotal + $this->tax + $this->shippingFee;
        $this->books = $this->books->reject(fn($book) => $book->id === $bookId);
    }

    /**
     * listener function on the change of shipping select
     */
    public function updatedSelectedShippingArea($areaId)
    {
        if ($areaId) {
            $this->shippingFee = ShippingArea::find($areaId)?->fee ?? 0;
        }
        $this->total = $this->subTotal + $this->tax + $this->shippingFee;
    }

    /**
     * listener function on the change of address select
     */
    public function updatedSelectedAddress($addressValue)
    {
        $this->showEnterNewAddress = ($addressValue === 'new_address');
    }

    public function checkOut()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Login first to checkout');
        }

        $this->validate([
            'selectedShippingArea' => 'required|exists:shipping_areas,id',
            'paymentType' => ['required', Rule::enum(PaymentType::class)]
        ]);

        $user = Auth::guard('web')->user();

        // Case 1: User must select an existing address if not entering a new one
        if (!$this->showEnterNewAddress && empty($this->selectedAddress) && $user->addresses()->count() > 0) {
            $this->addError('selectedAddress', 'Please select an existing address or enter a new one.');
            return;
        }

        // Case 2: User is entering a new address but hasn't provided one
        if ($this->showEnterNewAddress && empty($this->address)) {
            $this->addError('address', 'Please enter a valid address.');
            return;
        }

        // Case 3: User has no saved addresses and must enter one
        if ($user->addresses()->count() == 0 && empty($this->address)) {
            $this->addError('address', 'Please enter your address to proceed.');
            return;
        }

        try {

            DB::beginTransaction();

            //Create order
            $order = $user->orders()->create([
                'number' => strtoupper(substr(md5(time() . $user->id), 0, 8)),
                'shipping_fee' => $this->shippingFee,
                'tax_amount' => $this->tax,
                'books_total' => $this->subTotal,
                'total' => $this->total,
                'payment_type' => $this->paymentType,
                'payment_status' => $this->paymentType == PaymentType::Cash ? PaymentStatus::Paid : PaymentStatus::Unpaid,
                'shipping_area_id' => $this->selectedShippingArea,
                'user_address_id' => $this->getUserAddress($user)
            ]);

            //Create order items
            foreach($this->bookPrices as $book) {
                BookOrder::create([
                    'book_id' => $book['book_id'],
                    'order_id' => $order->id,
                    'original_price' => $book['original_price'],
                    'price_after_discount' => $book['price_after_discount'] / $book['quantity'],
                    'applied_discount' => $book['applied_discount'],
                    'quantity' => $book['quantity'],
                ]);
            }

            //Clear the cart
            AddToCart::where('user_id' , $user->id)->delete();

            DB::commit();
            return redirect()->route('home');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('home')->with('error', 'Try again!');
        }
    }

    private function getUserAddress($user)
    {
        // If the user enters a new address, or has no addresses and is entering one for the first time
        if (($this->showEnterNewAddress && !empty($this->address)) || ($user->addresses()->count() == 0 && !empty($this->address))) {
            return $this->createUserAddress($user, $this->address);
        }

        // If the user selects an existing address
        if (!$this->showEnterNewAddress && !empty($this->selectedAddress) && $this->selectedAddress !== 'new_address') {
            return $this->selectedAddress;
        }

        return null; // No valid address found
    }

    /**
     * Create a new address for the user and return it.
     */
    private function createUserAddress($user, $address)
    {
        $newAddress = $user->addresses()->create([
            'address' => $address
        ]);

        return $newAddress->id;
    }

    public function render()
    {
        return view('livewire.check-out-from-cart');
    }
}
