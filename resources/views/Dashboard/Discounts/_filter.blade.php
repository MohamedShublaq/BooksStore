<div class="mb-4">
    <form method="GET" action="{{ route('admin.discounts.index') }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="code" value="{{ request('code') }}" label="{{ __('discounts.Code') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="quantity" value="{{ request('quantity') }}" label="{{ __('discounts.Quantity') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="is_active">{{ __('discounts.Status') }}</label>
                    <x-adminlte-select name="is_active" id="is_active">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>
                            {{ __('discounts.Active') }}
                        </option>
                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>
                            {{ __('discounts.Inactive') }}
                        </option>
                    </x-adminlte-select>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
