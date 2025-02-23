<div class="d-flex flex-wrap justify-content-end mt-auto">
    @if ($isInCart)
        <button wire:click="removeFromCart" class="remove_from_cart">
            <i class="fa-solid fa-minus-circle"></i>
        </button>
    @else
        <button wire:click="addToCart" class="add_to_cart">
            <i class="fa-solid fa-cart-shopping"></i>
        </button>
    @endif
</div>
