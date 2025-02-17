<div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
    @if($discountedPrice !== null)
        <span class="text-muted fs-5 mt-3 text-decoration-line-through">${{ number_format($book->price, 2) }}</span>
        <span class="fw-bold ms-2 fs-5 mt-3">${{ number_format($discountedPrice, 2) }}</span>
    @else
        <span class="fw-bold fs-5 mt-3">${{ number_format($book->price, 2) }}</span>
    @endif
</div>
