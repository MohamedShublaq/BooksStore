@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/orders.css') }}" />
@endpush

@section('title', 'Orders')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <ul class="nav nav-pills gap-3 my-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-order active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-order" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                In Progress
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-order" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">
                                Completed
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-order" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-canceld" type="button" role="tab" aria-controls="pills-canceld"
                                aria-selected="false">
                                Canceled
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center my-3">
                                    <div class="step active">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="line">
                                        <!-- <i class="fa-solid fa-check"></i> -->
                                    </div>
                                    <div class="step">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="line">
                                        <!-- <i class="fa-solid fa-check"></i> -->
                                    </div>
                                    <div class="step">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center my-3">
                                    <div class="step active">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="line active">
                                        <!-- <i class="fa-solid fa-check"></i> -->
                                    </div>
                                    <div class="step active">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="line">
                                        <!-- <i class="fa-solid fa-check"></i> -->
                                    </div>
                                    <div class="step">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center my-3">
                                    <div class="step active">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="line active">
                                        <!-- <i class="fa-solid fa-check"></i> -->
                                    </div>
                                    <div class="step active">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="line active">
                                        <!-- <i class="fa-solid fa-check"></i> -->
                                    </div>
                                    <div class="step active">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123456</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-canceld" role="tabpanel"
                            aria-labelledby="pills-canceld-tab">
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123457</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123457</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                            <div class="order d-flex flex-column gap-3 my-3">
                                <div class="delete_order d-flex justify-content-end">
                                    <i class="fa-solid fa-trash main_text"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Order No.</p>
                                    <p class="text-dark">#123457</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Status</p>
                                    <p class="text-dark">In progress</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Date</p>
                                    <p class="text-dark">jul, 31 2024</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <p class="text-secondary">Address</p>
                                    <p class="text-dark">Maadi, Cairo, Egypt.</p>
                                </div>
                                <a class="d-flex align-items-center gap-3 main_text single-order">
                                    <p>View order detail</p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
