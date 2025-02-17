{{-- Add modal --}}
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('categories.Create New Category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <x-adminlte-input name="name[en]" label="{{__('categories.Name English')}}" fgroup-class="mb-4" required></x-adminlte-input>
                    </div>
                    <div class="form-group">
                        <x-adminlte-input name="name[ar]" label="{{__('categories.Name Arabic')}}" fgroup-class="mb-4" required></x-adminlte-input>
                    </div>
                    {{-- Select2 Dropdown --}}
                    <div class="form-group">
                        <label for="discount_id">{{__('categories.Discount')}}</label>
                        <select class="form-control" name="discount_id" id="discount_id">
                            <option selected disabled value="">{{__('categories.Select Discount')}}</option>
                            @foreach ($discounts as $discount)
                                <option value="{{ $discount->id }}">{{ $discount->code . ' (' . $discount->percentage . '%)' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('actions.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('actions.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Add modal --}}
