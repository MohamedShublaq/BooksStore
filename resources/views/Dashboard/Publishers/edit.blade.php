{{-- Edit modal --}}
<div class="modal fade" id="editPublisher_{{ $publisher->id }}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('publishers.Edit Publisher')}}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.publishers.update' , $publisher->id) }}"
                method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <x-adminlte-input name="name[en]" label="{{__('publishers.Name English')}}" value="{{$publisher->getTranslation('name','en')}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                    <div class="form-group">
                        <x-adminlte-input name="name[ar]" label="{{__('publishers.Name Arabic')}}" value="{{$publisher->getTranslation('name','ar')}}"
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
{{-- End Edit modal --}}
