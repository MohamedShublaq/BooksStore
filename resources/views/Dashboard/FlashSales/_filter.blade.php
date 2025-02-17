<div class="mb-4">
    <form method="GET" action="{{ route('admin.flash-sales.index') }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="name" value="{{ request('name') }}" label="{{ __('flashSales.Name') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="description" value="{{ request('description') }}" label="{{ __('flashSales.Description') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="is_active">{{ __('flashSales.Status') }}</label>
                    <x-adminlte-select name="is_active" id="is_active">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>
                            {{ __('flashSales.Active') }}
                        </option>
                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>
                            {{ __('flashSales.Inactive') }}
                        </option>
                    </x-adminlte-select>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
