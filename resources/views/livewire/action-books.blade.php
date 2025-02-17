<div class="d-flex flex-wrap gap-5 mt-auto justify-content-end">
    @if ($isInCart)
        <button wire:click="removeFromCart" class="remove_from_cart cart-btn w-50  flex-grow-1">
            <span>Remove From Cart</span>
            <i class="fa-solid fa-minus-circle"></i>
        </button>
    @else
        <button wire:click="addToCart" class="add_to_cart cart-btn w-50  flex-grow-1">
            <span>Add To Cart</span>
            <i class="fa-solid fa-cart-shopping"></i>
        </button>
    @endif
    @if ($isInWishlist)
        <button wire:click="removeFromWishlist" class="primary_btn_wishlist">
            <i class="fa-regular fa-heart"></i>
        </button>
    @else
        <button wire:click="addToWishlist" class="primary_btn">
            <i class="fa-regular fa-heart"></i>
        </button>
    @endif
</div>

