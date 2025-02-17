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
                        <!-- Swiper -->
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                </div>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper px-2 mt-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                </div>
                            </div>
                        </div>
                        <!-- Swiper -->
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="d-flex justify-content-between flex-wrap">
                            <h1>Rich Dad And Poor Dad</h1>
                            <div class="d-flex gap-3 align-items-center">
                                <a href="#">
                                    <img src="{{ asset('assets/website/images/facecolor.png') }}" alt="" />
                                </a>
                                <a href="#">
                                    <img src="{{ asset('assets/website/images/insatacolor.png') }}" alt="" />
                                </a>
                                <a href="#">
                                    <img src="{{ asset('assets/website/images/xcolor.png') }}" alt="" />
                                </a>
                                <a href="#">
                                    <img src="{{ asset('assets/website/images/whatscolor.png') }}" alt="" />
                                </a>
                                <a href="#">
                                    <img src="{{ asset('assets/website/images/share.png') }}" alt="" />
                                </a>
                            </div>
                        </div>
                        <p class="book__des">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Mauris et ultricies est. Aliquam in justo varius, sagittis
                            neque ut, malesuada leo. Aliquam in justo varius, sagittis neque
                            ut, malesuada leo.
                        </p>
                        <div>
                            <div class="d-flex gap-5 mt-3 flex-wrap">
                                <div>
                                    <p class="author">Author</p>
                                    <p class="author_name">Robert T. Kiyosaki</p>
                                </div>
                                <div>
                                    <p class="year">Year</p>
                                    <p>1999</p>
                                </div>
                                <div>
                                    <p class="year">Year</p>
                                    <p>1999</p>
                                </div>
                                <div>
                                    <p class="year">Book</p>
                                    <p>1 Of 1</p>
                                </div>
                                <div>
                                    <p class="year">Pages</p>
                                    <p>336</p>
                                </div>
                                <div>
                                    <p class="year">Language</p>
                                    <p>English</p>
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
                                        <p class="book_stars__review">(210 Review)</p>
                                    </div>
                                    <p class="my-3 book_stars__review-rate">
                                        Rate: <span class="text-dark">4.5</span>
                                    </p>
                                </div>
                                <div class="d-flex flex-wrap status__book gap-3 justify-content-end">
                                    <div class="instock d-flex gap-2">
                                        <img src="{{ asset('assets/website/images/instock.png') }}" alt=""
                                            width="20" height="20" />
                                        <p>In Stock</p>
                                    </div>
                                    <div class="dlivery d-flex gap-3">
                                        <img src="{{ asset('assets/website/images/shipping.png') }}" alt=""
                                            width="20" height="20" />
                                        <p>Free Shipping Today</p>
                                    </div>
                                    <p class="dis-code w-50">Discount code: Ne212</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between flex-wrap align-items-center prices__book">
                            <div class="d-flex align-items-center gap-3">
                                <p class="fs-2 fw-bold">$40.00</p>
                                <p class="des_price">$40.00</p>
                            </div>
                            <div class="d-flex gap-3 align-items-center mt-3">
                                <div class="books_count d-flex gap-3 align-items-center">
                                    <span>-</span>
                                    <p>1</p>
                                    <span>+</span>
                                </div>
                                <div>
                                    <button class="main_btn cart-btn">
                                        <span>Add To Cart</span>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                    <button class="primary_btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- nav tabs -->

                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active nav-tab_btn" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">
                                    Product Details
                                </button>
                            </li>
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
                            <div class="tab-pane fade show active mt-4" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                                <p class="py-2">
                                    <span class="fs-5 fw-bold">Book Title :</span> Rich Dad And
                                    Poor Dad
                                </p>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/website/js/singleBook.js') }}"></script>
@endpush
