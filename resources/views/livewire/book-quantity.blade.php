<div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
    <div class="d-flex gap-3 align-items-center mt-3">
        <div class="books_count d-flex gap-3 align-items-center">
            <span wire:click="decrement">-</span>
            <p>{{ $quantity }}</p>
            <span wire:click="increment">+</span>
        </div>
    </div>
</div>
