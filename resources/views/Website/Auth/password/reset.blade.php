@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/forgetPassword.css') }}" />
@endpush

@section('title', 'Reset Password')

@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{route('resetPassword')}}" class="login-form">
                        @csrf
                        <input hidden type="email" name="email" value="{{ $email }}" required />
                        <input hidden type="text" name="code" value="{{ $code }}" required />
                        <div class="d-flex flex-column gap-2">
                            <label for="password">Password</label>
                            <div class="input_container">
                                <input type="password" name="password" required/>
                            </div>
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <br>
                        <div class="d-flex flex-column gap-2">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input_container">
                                <input type="password" name="password_confirmation" required/>
                            </div>
                            @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
