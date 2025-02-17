@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/about.css') }}" />
@endpush

@section('title', 'About')

@section('hero_content')
    <div class="search">
        <div>
            <div class="about">
                <h1 class="about_title">About Bookshop</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et
                    ultricies est. Aliquam in justo varius, sagittis neque ut,
                    malesuada leo.
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- our mission -->
    <section class="missions py-5">
        <div class="container">
            <p class="head">Our Mission</p>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission">
                        <h2>Quality Selection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.
                        </p>
                        <a href="#" class="d-flex gap-2 align-items-center">
                            <p class="m-0">view More</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission">
                        <h2>Quality Selection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.
                        </p>
                        <a href="#" class="d-flex gap-2 align-items-center">
                            <p class="m-0">view More</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission">
                        <h2>Quality Selection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.
                        </p>
                        <a href="#" class="d-flex gap-2 align-items-center">
                            <p class="m-0">view More</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section  -->
    <section class="contact py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-8">
                    <div class="contact_head">
                        <h3>Have a Questions? Get in Touch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.
                        </p>
                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="d-flex gap-4">
                                <div class="d-flex flex-column gap-2 w-50">
                                    <div class="input_container input_contact">
                                        <input type="text" name="name" placeholder="Your Name" required />
                                    </div>
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column gap-2 w-50 mb-4">
                                    <div class="input_container input_contact">
                                        <input type="email" name="email" placeholder="Your Email" required />
                                    </div>
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <div class="input_container input_contact">
                                    <textarea name="message" id="message" placeholder="Your Message" rows="5" required></textarea>
                                </div>
                                @error('message')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="cart_btn main_btn">Send</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3">
                            <div class="contact_icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <p class="icon-detailes">01123456789</p>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="contact_icon">
                                <i class="fa-regular fa-message"></i>
                            </div>
                            <p class="icon-detailes">Example@gmail.com</p>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="contact_icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <p class="icon-detailes">
                                adipiscing elit. Mauris et ultricies est. Aliquam in justo
                                varius,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature -->
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
@endsection
