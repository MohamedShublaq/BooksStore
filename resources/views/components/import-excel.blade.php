<button type="button" class="btn btn-info" data-toggle="modal" data-target="#importExcelModal">
    <i class="fas fa-file-import"></i> {{ __('actions.import') }}
</button>
<div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="importExcelModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importExcelModalLabel">{{__('actions.import_excel_file')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.importFile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="model" value="{{ $model }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">{{__('actions.select_excel_file')}}</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                        @error('file')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('actions.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('actions.upload')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
