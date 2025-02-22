<div>
    @if ($books->isNotEmpty())
        <section class="my-5">
            <div class="container">
                <div class="row py-4 table_head">
                    <div class="col-5">
                        <p>Item</p>
                    </div>
                    <div class="col-2">
                        <p>Quantity</p>
                    </div>
                    <div class="col-2">
                        <p>Price</p>
                    </div>
                    <div class="col-3">
                        <p>Total Price</p>
                    </div>
                </div>
                <div class="col-12">
                    @foreach ($this->books as $book)
                        <div class="item-cart row" wire:key="book-{{ $book->id }}">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="item-image">
                                    <img src="{{ $book->image }}" alt="" class="w-100 h-100" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="item-description d-flex flex-column gap-2">
                                    <p class="fw-bold">{{ $book->name }}</p>
                                    <p class="description">
                                        Author:
                                        <span class="fw-bold text-dark">{{ $book->author->name }}</span>
                                    </p>
                                    <p class="description book-description">
                                        {{ $book->description }}
                                    </p>
                                    @if ($book->discountable)
                                        @if ($book->discountable_type == 'App\Models\FlashSale')
                                            <div class="discount d-flex gap-3">
                                                <i class="fas fa-bolt"></i>
                                                <p class="discount_code">Flash Sale
                                                    {{ $book->discountable->percentage }}%</p>
                                            </div>
                                        @else
                                            <div class="discount d-flex gap-3">
                                                <i class="fas fa-percent"></i>
                                                <p class="discount_code">Discount
                                                    {{ $book->discountable->percentage }}%</p>
                                            </div>
                                            <p class="sell-code description fw-bold fs-5">
                                                <span>CODE : </span>{{ $book->discountable->code }}
                                            </p>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            @livewire('book-quantity', ['book' => $book], key('book-quantity-' . $book->id))

                            @livewire('book-price', ['book' => $book], key('book-price-' . $book->id))

                            @livewire('book-total-price', ['book' => $book], key('book-total-price-' . $book->id))

                            <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">

                                @livewire('remove-book-from-cart-page', ['book' => $book], key('remove-book-' . $book->id))

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- payment -->
        <section class="my-5 py-5 payment-section">
            <div class="container">
                <div class="row">

                    @livewire('enter-discount-code', ['books' => $books])

                    @livewire('check-out-from-cart', ['books' => $books])

                </div>
            </div>
        </section>
    @else
        <section class="my-5 py-5 d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="alert alert-danger">
                            There are no books here yet!
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
