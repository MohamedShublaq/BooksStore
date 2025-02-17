{{-- Add modal --}}
<div class="modal fade" id="addShippingArea" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('areas.Create New Shipping Area')}}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.shipping-areas.store') }}"
                method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <x-adminlte-input name="name[en]" label="{{__('areas.Name English')}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                    <div class="form-group">
                        <x-adminlte-input name="name[ar]" label="{{__('areas.Name Arabic')}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                    <div class="form-group">
                        <x-adminlte-input name="fee" label="{{__('areas.Fee')}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{__('actions.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('actions.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Add modal --}}
