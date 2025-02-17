<div class="mb-4">
    <form method="GET" action="{{ route('admin.contacts.index') }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="name" value="{{ request('name') }}" label="{{ __('contacts.Name') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="email" value="{{ request('email') }}" label="{{ __('contacts.Email') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="message" value="{{ request('message') }}" label="{{ __('contacts.Message') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
