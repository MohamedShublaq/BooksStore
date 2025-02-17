{{-- Edit modal --}}
<div class="modal fade" id="editCategory_{{$category->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('categories.Edit Category')}}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.categories.update' , $category->id) }}"
                method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <x-adminlte-input name="name[en]" label="{{__('categories.Name English')}}" value="{{$category->getTranslation('name','en')}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                    <div class="form-group">
                        <x-adminlte-input name="name[ar]" label="{{__('categories.Name Arabic')}}" value="{{$category->getTranslation('name','ar')}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="discount_id" id="discount_id">
                            @if ($category->discount == null)
                                <option selected disabled value="">{{__('categories.Select Discount')}}</option>
                            @endif
                            @foreach ($discounts as $discount)
                                <option {{ $category->discount_id == $discount->id ? 'selected' : '' }} value="{{$discount->id}}">{{ $discount->code . ' (' . $discount->percentage . '%)' }}</option>
                            @endforeach
                        </select>
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
