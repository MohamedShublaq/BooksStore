@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/singleBook.css') }}" />
@endpush

@section('title', 'singleBook')

@section('content')
    <main>
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset($book->image) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="d-flex justify-content-between flex-wrap">
                            <h1>{{ $book->name }}</h1>
                            {{-- Call getFlag function in the Book model --}}
                            @if ($flag = $book->getFlag())
                                <div class="d-flex flex-wrap status__book justify-content-end">
                                    <p class="dis-code">{{ $flag['message'] }}</p>
                                </div>
                            @endif
                        </div>
                        <p class="book__des">
                            {{ $book->description }}
                        </p>
                        <div>
                            <div class="d-flex gap-5 mt-3 flex-wrap">
                                <div>
                                    <p class="year">Category</p>
                                    <p>{{ $book->category->name }}</p>
                                </div>
                                <div>
                                    <p class="year">Publisher</p>
                                    <p>{{ $book->publisher->name }}</p>
                                </div>
                                <div>
                                    <p class="author">Author</p>
                                    <p class="author_name">{{ $book->author->name }}</p>
                                </div>
                                <div>
                                    <p class="year">Year</p>
                                    <p>{{ $book->publish_year }}</p>
                                </div>
                                <div>
                                    <p class="year">Pages</p>
                                    <p>{{ $book->pages }}</p>
                                </div>
                                <div>
                                    <p class="year">Language</p>
                                    <p>{{$book->language->name}}</p>
                                </div>
                                <div>
                                    <p class="year">Rate</p>
                                    <p>{{ $book->rate }}</p>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-between flex-wrap">
                                <div class="book_stars">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="book_stars__review">({{ $book->num_of_viewers }} Review)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if ($book->discountable_type == 'App\Models\Discount' || ($book->discountable_type == 'App\Models\FlashSale' && \Carbon\Carbon::now() >= $book->discountable->date ))
                            @php
                                $discountAmount = ($book->price * $book->discountable->percentage) / 100;
                                $priceAfterDiscount = $book->price - $discountAmount;
                            @endphp
                            <div class="d-flex text-center align-items-center gap-3">
                                <p class="fs-2 fw-bold">${{ $priceAfterDiscount }}</p>
                                <p class="des_price">${{ $book->price }}</p>
                            </div>
                        @else
                            <div class="d-flex text-center align-items-center gap-3">
                                <p class="fs-2 fw-bold">${{ $book->price }}</p>
                            </div>
                        @endif
                        <br>
                        @if ($book->quantity > 0 && $book->is_available)
                            @livewire('action-books', ['book' => $book])
                        @endif
                    </div>
                    <!-- nav tabs -->

                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-tab_btn" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">
                                    Customer Reviews
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-tab_btn" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">
                                    Recomended For You
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row my-4 g-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="comment">
                                            <div class="person_comment d-flex gap-3 align-items-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/website/images/commentimage.jpeg') }}"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <p class="person_comment-name">John Smith</p>
                                                    <p class="person_comment-email">
                                                        Verified Purchase
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment_date">Reviewed On 28/07/2024</p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <h4 class="rate m-0">Excellent Book</h4>
                                                <div class="d-flex gap-3">
                                                    <p class="rate">4.5</p>
                                                    <div>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris et ultricies est. Aliquam in justo
                                                varius, sagittis neque ut,
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="comment">
                                            <div class="person_comment d-flex gap-3 align-items-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/website/images/commentimage.jpeg') }}"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <p class="person_comment-name">John Smith</p>
                                                    <p class="person_comment-email">
                                                        Verified Purchase
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment_date">Reviewed On 28/07/2024</p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <h4 class="rate m-0">Excellent Book</h4>
                                                <div class="d-flex gap-3">
                                                    <p class="rate">4.5</p>
                                                    <div>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris et ultricies est. Aliquam in justo
                                                varius, sagittis neque ut,
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="comment">
                                            <div class="person_comment d-flex gap-3 align-items-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/website/images/commentimage.jpeg') }}"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <p class="person_comment-name">John Smith</p>
                                                    <p class="person_comment-email">
                                                        Verified Purchase
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment_date">Reviewed On 28/07/2024</p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <h4 class="rate m-0">Excellent Book</h4>
                                                <div class="d-flex gap-3">
                                                    <p class="rate">4.5</p>
                                                    <div>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris et ultricies est. Aliquam in justo
                                                varius, sagittis neque ut,
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="comment">
                                            <div class="person_comment d-flex gap-3 align-items-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/website/images/commentimage.jpeg') }}"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <p class="person_comment-name">John Smith</p>
                                                    <p class="person_comment-email">
                                                        Verified Purchase
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment_date">Reviewed On 28/07/2024</p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <h4 class="rate m-0">Excellent Book</h4>
                                                <div class="d-flex gap-3">
                                                    <p class="rate">4.5</p>
                                                    <div>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris et ultricies est. Aliquam in justo
                                                varius, sagittis neque ut,
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="comment">
                                            <div class="person_comment d-flex gap-3 align-items-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/website/images/commentimage.jpeg') }}"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <p class="person_comment-name">John Smith</p>
                                                    <p class="person_comment-email">
                                                        Verified Purchase
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment_date">Reviewed On 28/07/2024</p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <h4 class="rate m-0">Excellent Book</h4>
                                                <div class="d-flex gap-3">
                                                    <p class="rate">4.5</p>
                                                    <div>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris et ultricies est. Aliquam in justo
                                                varius, sagittis neque ut,
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="comment">
                                            <div class="person_comment d-flex gap-3 align-items-center">
                                                <div class="image">
                                                    <img src="{{ asset('assets/website/images/commentimage.jpeg') }}"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <p class="person_comment-name">John Smith</p>
                                                    <p class="person_comment-email">
                                                        Verified Purchase
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment_date">Reviewed On 28/07/2024</p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <h4 class="rate m-0">Excellent Book</h4>
                                                <div class="d-flex gap-3">
                                                    <p class="rate">4.5</p>
                                                    <div>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris et ultricies est. Aliquam in justo
                                                varius, sagittis neque ut,
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="swiper books-sale_swiper my-5">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide d-flex justify-content-center">
                                            <div class="books-sale_card p-4">
                                                <div class="books-sale_card__image w-50 h-50">
                                                    <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                        alt="book_image" />
                                                </div>
                                                <div class="d-flex flex-column w-100 gap-2">
                                                    <div class="recommended_card__content">
                                                        <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                        <p class="recommended_author text-light">
                                                            <span class="text-secondary">Author:</span>
                                                            Robert T. Kiyosanki
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center">
                                                        <div>
                                                            <div class="stars d-flex gap-1">
                                                                <div>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star text-secondary"></i>
                                                                </div>
                                                                <p class="review text-light">(180 Review)</p>
                                                            </div>
                                                            <p class="rate text-light">
                                                                <span class="text-secondary"> Rate : </span>
                                                                4.2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p class="sale_price">$45.00</p>
                                                        <p class="main_price">$30.00</p>
                                                    </div>
                                                    <div class="range-container">
                                                        <input type="range" id="progress" min="0"
                                                            max="100" value="50"
                                                            oninput="updateRangeColor(this)" readonly />
                                                        <p class="mt-2 text-secondary">4 books left</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                        <button class="main_btn">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide d-flex justify-content-center">
                                            <div class="books-sale_card p-4">
                                                <div class="books-sale_card__image w-50 h-50">
                                                    <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                        alt="book_image" />
                                                </div>
                                                <div class="d-flex flex-column w-100 gap-2">
                                                    <div class="recommended_card__content">
                                                        <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                        <p class="recommended_author text-light">
                                                            <span class="text-secondary">Author:</span>
                                                            Robert T. Kiyosanki
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center">
                                                        <div>
                                                            <div class="stars d-flex gap-1">
                                                                <div>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star text-secondary"></i>
                                                                </div>
                                                                <p class="review text-light">(180 Review)</p>
                                                            </div>
                                                            <p class="rate text-light">
                                                                <span class="text-secondary"> Rate : </span>
                                                                4.2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p class="sale_price">$45.00</p>
                                                        <p class="main_price">$30.00</p>
                                                    </div>
                                                    <div class="range-container">
                                                        <input type="range" id="progress" min="0"
                                                            max="100" value="50"
                                                            oninput="updateRangeColor(this)" readonly />
                                                        <p class="mt-2 text-secondary">4 books left</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                        <button class="main_btn">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide d-flex justify-content-center">
                                            <div class="books-sale_card p-4">
                                                <div class="books-sale_card__image w-50 h-50">
                                                    <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                        alt="book_image" />
                                                </div>
                                                <div class="d-flex flex-column w-100 gap-2">
                                                    <div class="recommended_card__content">
                                                        <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                        <p class="recommended_author text-light">
                                                            <span class="text-secondary">Author:</span>
                                                            Robert T. Kiyosanki
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center">
                                                        <div>
                                                            <div class="stars d-flex gap-1">
                                                                <div>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star text-secondary"></i>
                                                                </div>
                                                                <p class="review text-light">(180 Review)</p>
                                                            </div>
                                                            <p class="rate text-light">
                                                                <span class="text-secondary"> Rate : </span>
                                                                4.2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p class="sale_price">$45.00</p>
                                                        <p class="main_price">$30.00</p>
                                                    </div>
                                                    <div class="range-container">
                                                        <input type="range" id="progress" min="0"
                                                            max="100" value="50"
                                                            oninput="updateRangeColor(this)" readonly />
                                                        <p class="mt-2 text-secondary">4 books left</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                        <button class="main_btn">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide d-flex justify-content-center">
                                            <div class="books-sale_card p-4">
                                                <div class="books-sale_card__image w-50 h-50">
                                                    <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                        alt="book_image" />
                                                </div>
                                                <div class="d-flex flex-column w-100 gap-2">
                                                    <div class="recommended_card__content">
                                                        <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                        <p class="recommended_author text-light">
                                                            <span class="text-secondary">Author:</span>
                                                            Robert T. Kiyosanki
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center">
                                                        <div>
                                                            <div class="stars d-flex gap-1">
                                                                <div>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star text-secondary"></i>
                                                                </div>
                                                                <p class="review text-light">(180 Review)</p>
                                                            </div>
                                                            <p class="rate text-light">
                                                                <span class="text-secondary"> Rate : </span>
                                                                4.2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p class="sale_price">$45.00</p>
                                                        <p class="main_price">$30.00</p>
                                                    </div>
                                                    <div class="range-container">
                                                        <input type="range" id="progress" min="0"
                                                            max="100" value="50"
                                                            oninput="updateRangeColor(this)" readonly />
                                                        <p class="mt-2 text-secondary">4 books left</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                        <button class="main_btn">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-prev splide__arrow splide__arrow_prev"></div>
                                    <div class="swiper-button-next splide__arrow splide__arrow_next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@push('js')
    <script src="{{ asset('assets/website/js/singleBook.js') }}"></script>
@endpush
