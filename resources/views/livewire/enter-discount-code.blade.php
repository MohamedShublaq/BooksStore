<div class="col-12 col-lg-6">
    <div class="payment">
        <p class="payment_title">Payment Summary</p>
        <div class=" py-5">
            <p class="fs-4 description mt-3">Have a discount code?</p>
            <div class="d-flex gap-3 mt-3">
                <div class="input_container w-50">
                    <img src="{{ asset('assets/website/images/ticket.png') }}" alt="" />
                    <input type="text" wire:model="code" placeholder="Enter Promo Code" />
                </div>
                <button type="button" wire:click="applyDiscount" class="cart_btn main_btn">Apply</button>
            </div>
            <div x-data="{ show: false }"
                x-show="show"
                x-transition.opacity
                x-init="@this.on('showSuccessMessage', () => { show = true; setTimeout(() => show = false, 3000); })"
                class="alert alert-success mt-2">
                {{ $successMessage }}
            </div>
            <div x-data="{ show: false }"
                x-show="show"
                x-transition.opacity
                x-init="@this.on('showWarningMessage', () => { show = true; setTimeout(() => show = false, 3000); })"
                class="alert alert-warning mt-2">
                {{ $warningMessage }}
            </div>
            <div x-data="{ show: false }"
                x-show="show"
                x-transition.opacity
                x-init="@this.on('showErrorMessage', () => { show = true; setTimeout(() => show = false, 3000); })"
                class="alert alert-danger mt-2">
                {{ $errorMessage }}
            </div>
        </div>
    </div>
</div>
