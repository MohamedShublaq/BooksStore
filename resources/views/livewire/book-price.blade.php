<div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
    @if ($discountedPrice !== null)
        <span class="fw-bold ms-2 fs-5 mt-3">${{ number_format($discountedPrice, 2) }}</span>
        <span class="des_price">${{ number_format($book->price, 2) }}</span>
    @elseif ($flashSalePrice !== null)
        <span class="fw-bold ms-2 fs-5 mt-3">${{ number_format($flashSalePrice, 2) }}</span>
        <span class="des_price">${{ number_format($book->price, 2) }}</span>
    @else
        <span class="fw-bold fs-5 mt-3">${{ number_format($book->price, 2) }}</span>
    @endif
</div>
