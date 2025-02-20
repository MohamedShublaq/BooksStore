<div class="mb-4">
    <form method="GET" action="{{ route('admin.books.index') }}">
        <div class="row">
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="name" value="{{ request('name') }}" label="{{ __('books.Name') }}"
                        placeholder="{{ __('actions.search') }}" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="price" value="{{ request('price') }}" label="{{ __('books.Price') }}"
                        placeholder="{{ __('actions.search') }}" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="is_available">{{ __('books.Availability') }}</label>
                    <x-adminlte-select name="is_available" id="is_available">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        <option value="1" {{ request('is_available') == '1' ? 'selected' : '' }}>
                            {{ __('books.Available') }}
                        </option>
                        <option value="0" {{ request('is_available') == '0' ? 'selected' : '' }}>
                            {{ __('books.Unavailable') }}
                        </option>
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="language_id">{{ __('books.Language') }}</label>
                    <x-adminlte-select name="language_id" id="language_id">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}"
                                {{ request('language_id') == $language->id ? 'selected' : '' }}>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="category_id">{{ __('books.Category') }}</label>
                    <x-adminlte-select name="category_id" id="category_id">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="publisher_id">{{ __('books.Publisher') }}</label>
                    <x-adminlte-select name="publisher_id" id="publisher_id">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}"
                                {{ request('publisher_id') == $publisher->id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="author_id">{{ __('books.Author') }}</label>
                    <x-adminlte-select name="author_id" id="author_id">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="discountable">{{ __('books.Discountable') }}</label>
                    <x-adminlte-select name="discountable" id="discountable">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        <option value="discount">{{ __('books.Have Discount') }}</option>
                        <option value="flash_sale">{{ __('books.Have Flash Sale') }}</option>
                        <option value="none">{{ __('books.None') }}</option>
                    </x-adminlte-select>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
