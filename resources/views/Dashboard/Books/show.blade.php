@extends('adminlte::page')

@section('title', 'Dashboard/Show Book')

@section('content_header')
    <h1 class="text-center">{{ __('books.Show Book Data') }}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-header text-center">
            <img src="{{ asset($book->image) }}" alt="Book Image" class="img-fluid rounded"
                style="max-width: 200px; height: auto;">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label>
                            {{ __('books.Name') }}
                        </label>
                        <x-adminlte-input name="name" type="text" value="{{ $book->name }}" fgroup-class="mb-4"
                            disabled />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>
                            {{ __('books.TotalStock') }}
                        </label>
                        <x-adminlte-input name="total_stock" type="text" value="{{ $book->total_stock }}" fgroup-class="mb-4"
                            disabled />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>
                            {{ __('books.RemainingQuantity') }}
                        </label>
                        <x-adminlte-input name="quantity" type="text" value="{{ $book->quantity }}" fgroup-class="mb-4"
                            disabled />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>
                            {{ __('books.Year') }}
                        </label>
                        <x-adminlte-input name="publish_year" type="text" value="{{ $book->publish_year }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>
                            {{ __('books.Pages') }}
                        </label>
                        <x-adminlte-input name="pages" type="text" value="{{ $book->pages }}" fgroup-class="mb-4"
                            disabled />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>
                            {{ __('books.Viewers') }}
                        </label>
                        <x-adminlte-input name="num_of_viewers" type="text" value="{{ $book->num_of_viewers }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>
                            {{ __('books.Rate') }}
                        </label>
                        <x-adminlte-input name="rate" type="text" value="{{ $book->rate }}" fgroup-class="mb-4"
                            disabled />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>
                            {{ __('books.Price') }}
                        </label>
                        <x-adminlte-input name="price" type="text" value="{{ $book->price }}" fgroup-class="mb-4"
                            disabled />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>
                            {{ __('books.Availability') }}
                        </label>
                        <x-adminlte-select name="is_available" fgroup-class="mb-4" disabled>
                            <option value="1" {{ $book->is_available ? 'selected' : '' }}>
                                {{ __('books.Available') }}</option>
                            <option value="0" {{ !$book->is_available ? 'selected' : '' }}>
                                {{ __('books.Unavailable') }}</option>
                        </x-adminlte-select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>
                            {{ __('books.Language') }}
                        </label>
                        <x-adminlte-input name="language_id" type="text" value="{{ $book->language->name ?? '' }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>
                            {{ __('books.Category') }}
                        </label>
                        <x-adminlte-input name="category_id" type="text" value="{{ $book->category->name ?? '' }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>
                            {{ __('books.Publisher') }}
                        </label>
                        <x-adminlte-input name="publisher_id" type="text" value="{{ $book->publisher->name ?? '' }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>
                            {{ __('books.Author') }}
                        </label>
                        <x-adminlte-input name="author_id" type="text" value="{{ $book->author->name ?? '' }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>
                            {{ __('books.Description') }}
                        </label>
                        <x-adminlte-textarea name="description" fgroup-class="mb-4" rows="5"
                            disabled>{{ $book->description }}</x-adminlte-textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>
                            {{ __('books.Created Since') }}
                        </label>
                        <x-adminlte-input name="created_at" type="text" value="{{ $book->created_at->diffForHumans() }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>
                            {{ __('books.Last Update') }}
                        </label>
                        <x-adminlte-input name="updated_at" type="text" value="{{ $book->updated_at->diffForHumans() }}"
                            fgroup-class="mb-4" disabled />
                    </div>
                </div>
            </div>
            @if ($book->discountable_type)
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-select disabled id="discountable_type" name="discountable_type"
                                label="{{ __('books.Discountable') }}" fgroup-class="mb-4">
                                <option value="App\Models\Discount"
                                    {{ $book->discountable_type == 'App\Models\Discount' ? 'selected' : '' }}>
                                    {{ __('books.Discount') }}</option>
                                <option value="App\Models\FlashSale"
                                    {{ $book->discountable_type == 'App\Models\FlashSale' ? 'selected' : '' }}>
                                    {{ __('books.Flash Sale') }}</option>
                            </x-adminlte-select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ $book->discountable_type == 'App\Models\Discount' ? __('books.Discount') : __('books.Flash Sale') }}
                            </label>
                            <x-adminlte-input name="discountable_id" type="text"
                                value="{{ optional($book->discountable)->code ?? optional($book->discountable)->name }} ({{ optional($book->discountable)->percentage ?? '0' }}%)"
                                fgroup-class="mb-4" disabled />
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
