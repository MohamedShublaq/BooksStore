<div class="mb-4">
    <form method="GET" action="{{ route('admin.publishers.index') }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <x-adminlte-input name="name" value="{{ request('name') }}" label="{{ __('publishers.Name') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
