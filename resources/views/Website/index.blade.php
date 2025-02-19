@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/home.css') }}" />
@endpush

@section('title', 'Home')

@section('hero_content')
    <div class="search">
        <div class="search-container">
            <div class="search_input">
                <input type="text" id="searchInput" placeholder="Search">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="main_bg py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/website/images/shipping.png') }}" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>Fast & Reliable Shipping</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/website/images/credit-card-buyer.png') }}" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>Secure Payment</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/website/images/restock.png') }}" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>Easy Returns</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/website/images/user-headset.png') }}" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>24/7 Customer Support</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="best_seller">
        <div class="container">
            <div class="best_seller-head">
                <h2>Best Seller</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et
                    ultricies est. Aliquam in justo varius, sagittis neque ut, malesuada
                    leo.
                </p>
            </div>
        </div>
        <div id="splide-marquee" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-1.jpg') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-2.png') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-3.jpg') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-4.jpg') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-5.jpg') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-6.jpg') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-7.png') }}" alt="" />
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('assets/website/images/book-8.png') }}" alt="" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="shop d-flex justify-content-center">
            <a href="{{ route('books') }}" class="main_btn shop_btn text-center">Shop now</a>
        </div>
    </section>
    <section class="recommended my-5 py-5 border-bottom">
        <div class="container">
            <p class="recommended_title mb-5">Recomended For You</p>
            <div class="row g-4">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="recommended_card d-flex gap-4 p-4">
                        <div class="recomended_card__image">
                            <img src="{{ asset('assets/website/images/book-1.jpg') }}" alt=""
                                class="w-100 h-100" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div class="recommended_card__content">
                                <h3>Rich Dad And Poor Dad</h3>
                                <p class="recommended_author">
                                    <span>Author:</span> Robert T. Kiyosanki
                                </p>
                                <p class="recommended_description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris et ultricies est. Aliquam in justo varius, sagittis
                                    neque ut, malesuada leo. Aliquam in justo varius, Aliquam in
                                    justo varius,
                                </p>
                            </div>
                            <div class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <div class="stars d-flex gap-1">
                                        <div>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="review">(180 Review)</p>
                                    </div>
                                    <p class="rate"><span> Rate : </span> 4.2</p>
                                </div>
                                <div class="recommended_card__price">
                                    <p>$30.00</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-auto">
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
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="recommended_card d-flex gap-4 p-4">
                        <div class="recomended_card__image">
                            <img src="{{ asset('assets/website/images/book-2.png') }}" alt=""
                                class="w-100 h-100" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div class="recommended_card__content">
                                <h3>Rich Dad And Poor Dad</h3>
                                <p class="recommended_author">
                                    <span>Author:</span> Robert T. Kiyosanki
                                </p>
                                <p class="recommended_description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris et ultricies est. Aliquam in justo varius, sagittis
                                    neque ut, malesuada leo. Aliquam in justo varius, Aliquam in
                                    justo varius,
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
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="review">(180 Review)</p>
                                    </div>
                                    <p class="rate"><span> Rate : </span> 4.2</p>
                                </div>
                                <div class="recommended_card__price">
                                    <p>$30.00</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-auto">
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
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="recommended_card d-flex gap-4 p-4">
                        <div class="recomended_card__image">
                            <img src="{{ asset('assets/website/images/book-3.jpg') }}" alt=""
                                class="w-100 h-100" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div class="recommended_card__content">
                                <h3>Rich Dad And Poor Dad</h3>
                                <p class="recommended_author">
                                    <span>Author:</span> Robert T. Kiyosanki
                                </p>
                                <p class="recommended_description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris et ultricies est. Aliquam in justo varius, sagittis
                                    neque ut, malesuada leo. Aliquam in justo varius, Aliquam in
                                    justo varius,
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
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="review">(180 Review)</p>
                                    </div>
                                    <p class="rate"><span> Rate : </span> 4.2</p>
                                </div>
                                <div class="recommended_card__price">
                                    <p>$30.00</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-auto">
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
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="recommended_card d-flex gap-4 p-4">
                        <div class="recomended_card__image">
                            <img src="{{ asset('assets/website/images/book-4.jpg') }}" alt=""
                                class="w-100 h-100" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div class="recommended_card__content">
                                <h3>Rich Dad And Poor Dad</h3>
                                <p class="recommended_author">
                                    <span>Author:</span> Robert T. Kiyosanki
                                </p>
                                <p class="recommended_description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Mauris et ultricies est. Aliquam in justo varius, sagittis
                                    neque ut, malesuada leo. Aliquam in justo varius, Aliquam in
                                    justo varius,
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
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="review">(180 Review)</p>
                                    </div>
                                    <p class="rate"><span> Rate : </span> 4.2</p>
                                </div>
                                <div class="recommended_card__price">
                                    <p>$30.00</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-auto">
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
            </div>
        </div>
    </section>
    <section class="books-sale">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="books-sale_head">
                    <h4>Flash Sale</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et
                        ultricies est. Aliquam in justo varius, sagittis neque ut,
                        malesuada leo.
                    </p>
                </div>
                <div class="counter">
                    <div class="timer">
                        <p>30:00:00</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="splide d-flex p-0" aria-label="Custom Arrows Example" id="saleSlider">
                        <div class="splide__arrows">
                            <button class="splide__arrow splide__arrow--prev">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button class="splide__arrow splide__arrow--next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>

                        <div class="splide__track w-100 p-0">
                            <ul class="splide__list w-100">
                                <li class="splide__slide splide__slide-sale">
                                    <div class="books-sale_card w-100 p-4">
                                        <div class="books-sale_card__image w-50">
                                            <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                alt="book_image" />
                                        </div>
                                        <div class="d-flex flex-column w-100 gap-2">
                                            <div class="recommended_card__content">
                                                <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                <p class="recommended_author text-light">
                                                    <span class="text-secondary">Author:</span> Robert
                                                    T. Kiyosanki
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
                                                        <span class="text-secondary"> Rate : </span> 4.2
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <p class="sale_price">$45.00</p>
                                                <p class="main_price">$30.00</p>
                                            </div>
                                            <div class="range-container">
                                                <input type="range" id="progress" min="0" max="100"
                                                    value="50" oninput="updateRangeColor(this)" readonly />
                                                <p class="mt-2 text-secondary">4 books left</p>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                <button class="main_btn">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide splide__slide-sale">
                                    <div class="books-sale_card w-100 p-4">
                                        <div class="books-sale_card__image w-50">
                                            <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                alt="book_image" />
                                        </div>
                                        <div class="d-flex flex-column w-100 gap-2">
                                            <div class="recommended_card__content">
                                                <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                <p class="recommended_author text-light">
                                                    <span class="text-secondary">Author:</span> Robert
                                                    T. Kiyosanki
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
                                                        <span class="text-secondary"> Rate : </span> 4.2
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <p class="sale_price">$45.00</p>
                                                <p class="main_price">$30.00</p>
                                            </div>
                                            <div class="range-container">
                                                <input type="range" id="progress" min="0" max="100"
                                                    value="50" oninput="updateRangeColor(this)" readonly />
                                                <p class="mt-2 text-secondary">4 books left</p>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                <button class="main_btn">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide splide__slide-sale">
                                    <div class="books-sale_card w-100 p-4">
                                        <div class="books-sale_card__image w-50">
                                            <img src="{{ asset('assets/website/images/book-3.jpg') }}"
                                                alt="book_image" />
                                        </div>
                                        <div class="d-flex flex-column w-100 gap-2">
                                            <div class="recommended_card__content">
                                                <h3 class="text-light">Rich Dad And Poor Dad</h3>
                                                <p class="recommended_author text-light">
                                                    <span class="text-secondary">Author:</span> Robert
                                                    T. Kiyosanki
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
                                                        <span class="text-secondary"> Rate : </span> 4.2
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <p class="sale_price">$45.00</p>
                                                <p class="main_price">$30.00</p>
                                            </div>
                                            <div class="range-container">
                                                <input type="range" id="progress" min="0" max="100"
                                                    value="50" oninput="updateRangeColor(this)" readonly />
                                                <p class="mt-2 text-secondary">4 books left</p>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-end mt-auto">
                                                <button class="main_btn">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="{{ asset('assets/website/js/home.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Handle input change and make the AJAX request
        $('#searchInput').on('input', function() {
            let searchTerm = $(this).val().toLowerCase();

            if (searchTerm.length > 0) {
                $('.search_input').addClass('searching');

                $.ajax({
                    url: "{{ route('search') }}",
                    method: "GET",
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        let resultsContainer = $('#searchResults');

                        if (resultsContainer.length === 0) {

                            resultsContainer = $('<ul class="search-results" id="searchResults"></ul>');
                            $(resultsContainer).insertAfter($('#searchInput').closest(
                                '.search_input'));

                        }

                        resultsContainer.empty();

                        if (response.length > 0) {

                            response.forEach(function(book) {
                                let resultItem = "";

                                if (book.name.toLowerCase().includes(searchTerm)) {

                                    let highlightedName = book.name.replace(new RegExp(`(${searchTerm})`, "gi"), "<strong>$1</strong>");
                                    resultItem = `<li class="search-item">${highlightedName}</li>`;

                                } else if (book.description.en.toLowerCase().includes(searchTerm)) {

                                    let description = book.description.en.toLowerCase();
                                    let matchIndex = description.indexOf(searchTerm);

                                    if (matchIndex !== -1) {
                                        let start = Math.max(0, matchIndex -30);
                                        let end = Math.min(description.length, matchIndex +searchTerm.length + 30);
                                        let snippet = book.description.en.substring(start, end);
                                        // Highlight the matched term
                                        snippet = snippet.replace(new RegExp(`(${searchTerm})`,"gi"), "<strong>$1</strong>");
                                        // Remove leading "..." if the search term is at the start
                                        let prefix = start > 0 ? "..." : "";
                                        let suffix = end < description.length ? "..." : "";

                                        resultItem =
                                            `<li class="search-item"><p>${prefix}${snippet}${suffix}</p></li>`;
                                    }
                                }

                                if (resultItem) {
                                    resultsContainer.append(resultItem);
                                }
                            });
                        } else {
                            resultsContainer.append('<li class="search-item">No books found</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", error);
                    }
                });
            } else {
                $('.search_input').removeClass('searching');
                $('#searchResults').remove();
            }
        });
    </script>
@endpush
