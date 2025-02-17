@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/resetPassword.css') }}" />
@endpush

@section('title', 'Reset Password')

@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <div class="py-4">
                <p class="text-center main_text fw-bold">Reset your password!</p>
                <p class="text-secondary text-center mt-2">
                    Enter the 4 digits code that you received on your email
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    <form method="POST">
                        <div class="d-flex  gap-2 ">
                            <div class="input_container w-25">
                                <input type="text" maxlength="1" autofocus class="text-center" />
                            </div>
                            <div class="input_container w-25">
                                <input type="text" maxlength="1" class="text-center" />
                            </div>
                            <div class="input_container w-25">
                                <input type="text" maxlength="1" class="text-center" />
                            </div>
                            <div class="input_container w-25">
                                <input type="text" maxlength="1" class="text-center" />
                            </div>

                        </div>
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Send reset code
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{asset('assets/website/js/restPassword.js')}}"></script>
@endpush

