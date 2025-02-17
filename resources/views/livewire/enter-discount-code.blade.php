<div class="col-12 col-lg-6">
    <div class="payment">
        <p class="payment_title">Payment Summary</p>
        <p class="payment_description description fs-6 mt-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Mauris et ultricies est. Aliquam in justo varius, sagittis
            neque ut, malesuada leo.
        </p>
        <div class=" py-5">
            <p class="fs-4 description mt-3">Have a discount code?</p>
            {{-- <div class="d-flex gap-3 mt-3">
                <form wire:submit.prevent="save" class="input_container w-50">
                    <img src="{{ asset('assets/website/images/ticket.png') }}" alt="" />
                    <input type="text" wire:model="code" placeholder="Enter Promo Code" />
                </form>
                <button type="submit" class="cart_btn main_btn">Apply</button>
            </div> --}}
            <div class="d-flex gap-3 mt-3">
                <div class="input_container w-50">
                    <img src="{{ asset('assets/website/images/ticket.png') }}" alt="" />
                    <input type="text" wire:model="code" placeholder="Enter Promo Code" />
                </div>
                <button type="button" wire:click="applyDiscount" class="cart_btn main_btn">Apply</button>
            </div>
        </div>
    </div>
</div>
