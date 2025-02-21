<div>
    @foreach ($books as $book)
        <div class="row books_book" wire:key="book-{{ $book->id }}">
            <div class="col-lg-3">
                <div class="book_image">
                    <a href="{{ route('showBook', $book->slug) }}">
                        <img src="{{ asset($book->image) }}" alt="book image" class="w-100" />
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="book_detailes">
                    <div class="d-flex align-items-start book_detailes__content">
                        <div>
                            <p class="book_detailes__title">
                                <a href="{{ route('showBook', $book->slug) }}">{{ $book->name}}</a>
                            </p>
                            <p class="book_detailes__description">
                                {{ $book->description }}
                            </p>
                        </div>
                        {{-- Call getFlag function in the Book model --}}
                        @if ($flag = $book->getFlag())
                            <div class="discount">
                                <p class="discount_code">{{ $flag['message'] }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-4">
                        <div>
                            <div class="book_stars">
                                <div class="d-flex gap-2 align-items-center">
                                    <div>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="book_stars__review">({{ $book->num_of_viewers }} Review)</p>
                                </div>
                                <p class="my-3 book_stars__review-rate">
                                    Rate: <span class="text-dark">{{ $book->rate }}</span>
                                </p>
                            </div>
                            <div class="d-flex gap-5">
                                <div>
                                    <p class="author">Author</p>
                                    <p class="author_name">{{ $book->author->name }}</p>
                                </div>
                                <div>
                                    <p class="year">Year</p>
                                    <p>{{ $book->publish_year }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="recommended_card__price">
                                <p class="text-end mb-4">{{ $book->price }} EGP</p>
                                @if ($book->quantity > 0 && $book->is_available)
                                    @livewire('action-books', ['book' => $book], key('book-actions-' . $book->id))
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $books->links() }}
</div>
