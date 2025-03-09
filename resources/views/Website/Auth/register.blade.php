@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/register.css') }}" />
@endpush

@section('title', 'Register')

@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    @if ($errors->has('register'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('register') }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('postRegister') }}" method="POST" class="login-form">
                        @csrf
                        <div class="d-flex gap-2 user-name">
                            <div class="d-flex flex-column gap-2">
                                <label for="email">First Name</label>
                                <div class="input_container">
                                    <input type="text" name="first_name" required />
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label for="email">Last Name</label>
                                <div class="input_container">
                                    <input type="text" name="last_name" required />
                                </div>
                            </div>
                        </div>
                        @error('first_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @error('last_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div class="d-flex gap-2 user-name my-3">
                            <div class="d-flex flex-column gap-2">
                                <label for="email">Email</label>
                                <div class="input_container">
                                    <input type="email" name="email" required />
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label for="email">Phone</label>
                                <div class="input_container">
                                    <input type="text" name="phone" required />
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @error('phone')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div class="d-flex flex-column gap-2 my-3">
                            <label for="password">Password</label>
                            <div class="d-flex align-items-center input_container">
                                <input type="password" name="password" id="password" required />
                                <i class="fa-regular fa-eye" id="togglePassword"></i>
                            </div>
                        </div>
                        @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div class="d-flex flex-column gap-2 my-3">
                            <label for="password_confirmation">Confirm password</label>
                            <div class="d-flex align-items-center input_container">
                                <input type="password" name="password_confirmation" id="password_confirmation" required />
                                <i class="fa-regular fa-eye" id="togglePasswordConfirmation"></i>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Sign Up
                            </button>
                        </div>
                    </form>
                    <p class="mt-4 text-center">
                        Already have an account?
                        <a href="{{ route('login') }}" class="main_text">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle for password field
            const togglePassword = document.getElementById('togglePassword');
            const passwordField = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = passwordField.type === 'password' ? 'text' : 'password';
                passwordField.type = type;
                this.classList.toggle('fa-eye-slash');
            });

            // Toggle for confirm password field
            const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
            const passwordConfirmationField = document.getElementById('password_confirmation');

            togglePasswordConfirmation.addEventListener('click', function() {
                const type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
                passwordConfirmationField.type = type;
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endpush
