@extends('adminlte::page')

@section('title', 'Dashboard/Edit Book')

@section('content_header')
    <h1 class="text-center">{{ __('books.Edit Book') }}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Name') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="name" type="text"
                                value="{{ $book->name }}" fgroup-class="mb-4" required />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Quantity') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="quantity" type="text"
                                value="{{ $book->quantity }}" fgroup-class="mb-4" required />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Pages') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="pages" type="text"
                                value="{{ $book->pages }}" fgroup-class="mb-4" required />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Language') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-select name="language_id" fgroup-class="mb-4"
                                required>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}"
                                        {{ $book->language_id == $language->id ? 'selected' : '' }}>{{ $language->name }}
                                    </option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Rate') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="rate" type="text"
                                value="{{ $book->rate }}" fgroup-class="mb-4" required />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Year') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="publish_year" type="text"
                                value="{{ $book->publish_year }}" fgroup-class="mb-4" required />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Price') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="price" type="text"
                                value="{{ $book->price }}" fgroup-class="mb-4" required />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>
                                {{ __('books.Availability') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-select name="is_available"
                                fgroup-class="mb-4" required>
                                <option value="1" {{ $book->is_available ? 'selected' : '' }}>
                                    {{ __('books.Available') }}</option>
                                <option value="0" {{ !$book->is_available ? 'selected' : '' }}>
                                    {{ __('books.Unavailable') }}</option>
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>
                                {{ __('books.Category') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-select name="category_id" fgroup-class="mb-4"
                                required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>
                                {{ __('books.Publisher') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-select name="publisher_id" fgroup-class="mb-4"
                                required>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>
                                {{ __('books.Author') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-select name="author_id" fgroup-class="mb-4"
                                required>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-select id="discountable_type" name="discountable_type"
                                label="{{ __('books.Discountable') }}" fgroup-class="mb-4">
                                <option selected disabled value="">{{ __('actions.choose') }}</option>
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
                        <div class="form-group" id="discountable_wrapper"
                            style="display: {{ $book->discountable_type ? 'block' : 'none' }};">
                            <label id="discountable_label">{{ $book->discountable_type == 'App\Models\Discount' ? __('books.Discount') : __('books.Flash Sale')  }}</label>
                            <x-adminlte-select id="discountable_id" name="discountable_id" fgroup-class="mb-4">
                                @if ($book->discountable_type == 'App\Models\Discount')
                                    @foreach ($discounts as $discount)
                                        <option value="{{ $discount->id }}"
                                            {{ $book->discountable_id == $discount->id ? 'selected' : '' }}>
                                            {{ $discount->code }} ({{ $discount->percentage }}%)
                                        </option>
                                    @endforeach
                                @elseif ($book->discountable_type == 'App\Models\FlashSale')
                                    @foreach ($flashSales as $flashSale)
                                        <option value="{{ $flashSale->id }}"
                                            {{ $book->discountable_id == $flashSale->id ? 'selected' : '' }}>
                                            {{ $flashSale->name }} ({{ $flashSale->percentage }}%)
                                        </option>
                                    @endforeach
                                @endif
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('books.Description') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-textarea name="description"
                                fgroup-class="mb-4" rows="8"
                                required>{{ $book->description }}</x-adminlte-textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('books.Image') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input class="dropify mx-auto" name="image" type="file" fgroup-class="mb-4">
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <x-adminlte-button label="{{ __('actions.save') }}" theme="success" icon="fas fa-save"
                            type="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const discountableType = document.getElementById('discountable_type');
            const discountableId = document.getElementById('discountable_id');
            const discountableWrapper = document.getElementById('discountable_wrapper');
            const discountableLabel = document.getElementById('discountable_label');
            const discounts = @json($discounts);
            const flashSales = @json($flashSales);
            const locale = "{{ app()->getLocale() }}";

            discountableType.addEventListener('change', function() {
                const selectedType = discountableType.value;

                discountableId.innerHTML = '';

                if (selectedType === 'App\\Models\\Discount') {
                    discountableLabel.textContent = "{{ __('books.Discount') }}";
                    discounts.forEach(discount => {
                        const option = document.createElement('option');
                        option.value = discount.id;
                        option.textContent = `${discount.code} (${discount.percentage}%)`;
                        discountableId.appendChild(option);
                    });
                    discountableWrapper.style.display = 'block';

                } else if (selectedType === 'App\\Models\\FlashSale') {
                    discountableLabel.textContent = "{{ __('books.Flash Sale') }}";
                    flashSales.forEach(flashSale => {
                        const name = flashSale.name[locale];
                        const option = document.createElement('option');
                        option.value = flashSale.id;
                        option.textContent = `${name} (${flashSale.percentage}%)`;
                        discountableId.appendChild(option);
                    });
                    discountableWrapper.style.display = 'block';
                } else {
                    discountableWrapper.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drop the image here',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endpush
