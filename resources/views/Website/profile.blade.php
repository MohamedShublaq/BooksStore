@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/profile.css') }}" />
@endpush

@section('title', 'Profile')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <form class="profile_form" method="POST" action="{{ route('updateProfile') }}">
                        @csrf
                        <h3 class="text-center my-3">General information</h3>
                        <div class="row g-4">
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column gap-2">
                                    <label for="firstname">First Name</label>
                                    <div class="input_container">
                                        <input type="text" name="first_name" value="{{ $user->first_name }}" required />
                                    </div>
                                    @error('first_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column gap-2">
                                    <label for="lastname">Last Name</label>
                                    <div class="input_container">
                                        <input type="text" name="last_name" value="{{ $user->last_name }}" required />
                                    </div>
                                    @error('last_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    <label for="email">Email</label>
                                    <div class="input_container">
                                        <input type="email" name="email" value="{{ $user->email }}" required />
                                    </div>
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    <label for="phonenumber">Phone number</label>
                                    <div class="input_container">
                                        <input type="text" name="phone" value="{{ $user->phone }}" required />
                                    </div>
                                    @error('phone')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2 my-3">
                                <label for="address">Address</label>
                                <div id="address-container" class="d-flex flex-column gap-2">
                                    @foreach ($addresses as $index => $address)
                                        <div class="d-flex align-items-center input_container">
                                            <input type="text" name="addresses[]" value="{{ $address->address }}"
                                                required />
                                            <button type="button" class="btn btn-danger btn-sm remove-address ms-2">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            @if ($loop->last)
                                                <button type="button" class="btn btn-success btn-sm add-address ms-2">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="main_btn mt-3">Update information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addressContainer = document.getElementById("address-container");

            function updateButtons() {
                const addressFields = addressContainer.querySelectorAll(".input_container");

                addressFields.forEach((field, index) => {
                    const minusButton = field.querySelector(".remove-address");
                    const plusButton = field.querySelector(".add-address");

                    if (plusButton && index !== addressFields.length - 1) {
                        plusButton.remove();
                    }

                    if (index === addressFields.length - 1) {
                        if (!field.querySelector(".add-address")) {
                            const addButton = document.createElement("button");
                            addButton.type = "button";
                            addButton.classList.add("btn", "btn-success", "btn-sm", "add-address", "ms-2");
                            addButton.innerHTML = '<i class="fa fa-plus"></i>';
                            field.appendChild(addButton);
                        }
                    }

                    minusButton.classList.toggle("d-none", addressFields.length === 1);
                });
            }

            addressContainer.addEventListener("click", function(e) {
                if (e.target.closest(".add-address")) {
                    const newField = document.createElement("div");
                    newField.classList.add("d-flex", "align-items-center", "input_container");
                    newField.innerHTML = `
                <input type="text" name="addresses[]" required />
                <button type="button" class="btn btn-danger btn-sm remove-address ms-2">
                    <i class="fa fa-minus"></i>
                </button>
            `;
                    addressContainer.appendChild(newField);
                    updateButtons();
                }
            });

            addressContainer.addEventListener("click", function(e) {
                if (e.target.closest(".remove-address")) {
                    e.target.closest(".input_container").remove();
                    updateButtons();
                }
            });

            updateButtons();
        });
    </script>
@endpush
