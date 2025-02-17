<div class="mb-4">
    <form method="GET" action="{{ route('admin.categories.index') }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="name" value="{{ request('name') }}" label="{{ __('categories.Name') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="discount">{{ __('categories.Discount') }}</label>
                    <x-adminlte-select name="discount" id="discount">
                        <option value="" selected>{{ __('actions.choose') }}</option>
                        <option value="1" {{ request('discount') == '1' ? 'selected' : '' }}>
                            {{ __('categories.With Discount') }}
                        </option>
                        <option value="0" {{ request('discount') == '0' ? 'selected' : '' }}>
                            {{ __('categories.Without Discount') }}
                        </option>
                    </x-adminlte-select>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
