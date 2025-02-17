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

                <div class="row">

                    @foreach ($this->books as $book)
                        <div class="col-12 {{ !$loop->first ? 'mt-4' : '' }}" wire:key="book-{{ $book->id }}">
                            <div class="item-cart row">
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="item-image">
                                        <img src="{{ $book->image }}" alt=""
                                            class="w-100 h-100" />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="item-description d-flex flex-column gap-2">
                                        <p class="fw-bold">{{ $book->name }}</p>
                                        <p class="description">
                                            Author:
                                            <span class="fw-bold text-dark">Robert T. Kiyosanki</span>
                                        </p>
                                        <p class="description book-description">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Mauris et ultricies est. Aliquam in justo varius, sagittis
                                            neque ut,
                                        </p>
                                        <div class="dlivery d-flex gap-3">
                                            <img src="{{ asset('assets/website/images/shipping.png') }}" alt=""
                                                width="20" height="20" />
                                            <p class="description">Free Shipping Today</p>
                                        </div>
                                        <p class="description">
                                            <span class="sell-code description fw-bold fs-5">ASIN :</span>B09TWSRMCB
                                        </p>
                                    </div>
                                </div>

                                @livewire('book-quantity', ['book' => $book], key('book-quantity-' . $book->id))

                                <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                    <p class="fw-bold fs-5 mt-3">${{ number_format($book->price,2) }}</p>
                                </div>

                                @livewire('book-total-price', ['book' => $book], key('book-total-price-' . $book->id))

                                <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">

                                    @livewire('remove-book-from-wishlist-page', ['book' => $book], key('remove-book-' . $book->id))

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex gap-3 justify-content-center mt-4 flex-wrap">

                        @livewire('move-books-from-wishlist-to-cart', ['books' => $books])

                        <button class="main_btn d-flex justify-content-between align-items-center col-12 col-md-5 col-lg-4">

                            @livewire('check-out-from-wishlist', ['books' => $books])

                            <div>
                                <p class="fs-6 fw-bold">Check out</p>
                            </div>
                            <div class="arrow-icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </button>
                    </div>
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
