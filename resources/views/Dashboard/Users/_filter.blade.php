<div class="mb-4">
    <form method="GET" action="{{ route('admin.users.index') }}">
        <div class="row">
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="first_name" value="{{ request('first_name') }}" label="{{ __('users.firstName') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="last_name" value="{{ request('last_name') }}" label="{{ __('users.lastName') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="email" value="{{ request('email') }}" label="{{ __('users.email') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="phone" value="{{ request('phone') }}" label="{{ __('users.phone') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
