<div class="col-12 col-lg-6">
    <div class="total p-3">
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-secondary fs-5">Subtotal</p>
            <p class="fs-4 fw-bold">${{number_format($subTotal,2)}}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center py-3">
            <p class="text-secondary fs-5">Tax</p>
            <p class="fs-4 fw-bold">${{number_format($tax,2)}}</p>
        </div>
        @auth
            <div class="d-flex justify-content-between align-items-center mt-3 gap-5">
                <p class="text-secondary fs-5">Shipping</p>
                <select class="form-control w-50" wire:model.live="selectedShippingArea" required>
                    <option selected value="">Choose</option>
                    @foreach ($shippingAreas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('selectedShippingArea')
                    <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="d-flex justify-content-between align-items-center mt-3 gap-5">
                <p class="text-secondary fs-5">Address</p>
                @if (auth()->user()->addresses()->count() > 0)
                    @if (!$showEnterNewAddress)
                        <select class="form-control w-50" wire:model.live="selectedAddress" required>
                            <option selected value="">Choose</option>
                            <option value="new_address">Enter New Address</option>
                            @foreach (auth()->user()->addresses as $address)
                                <option value="{{$address->id}}">{{$address->address}}</option>
                            @endforeach
                        </select>
                    @else
                        <div class="input_container w-50">
                            <input type="text" wire:model="address" placeholder="Enter Your Address" />
                        </div>
                    @endif
                @else
                    <div class="input_container w-50">
                        <input type="text" wire:model="address" placeholder="Enter Your Address" />
                    </div>
                @endif
            </div>
            @error('selectedAddress')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        @endauth
        <div class="d-flex justify-content-between align-items-center py-3">
            <p class="text-secondary fs-5">Payment Type</p>
            <div class="d-flex gap-5">
                <label class="d-flex align-items-center gap-2">
                    <input type="radio" wire:model="paymentType" value="{{$cash}}" class="form-check-input" />
                    Cash
                </label>
                <label class="d-flex align-items-center gap-2">
                    <input type="radio" wire:model="paymentType" value="{{$visa}}" class="form-check-input" />
                    Visa
                </label>
            </div>
            @error('paymentType')
                    <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-between align-items-center border-top py-3">
            <p class="text-secondary fs-5">Total with shipping</p>
            <p class="fs-3 fw-bold main_text">${{number_format($total,2)}}</p>
        </div>
    </div>
    <button wire:click="checkOut" class="main_btn w-100">Check out</button>
    <a href="{{route('books')}}" class="primary_btn w-100 mt-3 text-center d-block">
        Keep Shopping
    </a>
</div>
