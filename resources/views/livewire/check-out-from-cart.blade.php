<div class="col-12 col-lg-6">
    <div class="total p-3">
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-secondary fs-5">Subtotal</p>
            <p class="fs-4 fw-bold">${{number_format($subTotal,2)}}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="text-secondary fs-5">Shipping</p>
            <p class="fs-4 fw-bold">Free Delivery</p>
        </div>
        <div class="d-flex justify-content-between align-items-center py-3">
            <p class="text-secondary fs-5">Tax</p>
            <p class="fs-4 fw-bold">$4</p>
        </div>
        <div class="d-flex justify-content-between align-items-center border-top py-3">
            <p class="text-secondary fs-5">Total</p>
            <p class="fs-3 fw-bold main_text">$124</p>
        </div>
    </div>
    <button class="main_btn w-100">Check out</button>
    <a href="{{route('books')}}" class="primary_btn w-100 mt-3 text-center d-block">
        Keep Shopping
    </a>
</div>
