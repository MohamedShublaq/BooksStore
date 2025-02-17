@extends('adminlte::page')

@section('title', 'Dashboard/Authorizations')

@section('content_header')
    <h1>{{__('roles.Edit Role')}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.authorizations.update', $authorization->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="role[en]" label="{{__('roles.Role English')}}" value="{{$authorization->getTranslation('role','en')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="role[ar]" label="{{__('roles.Role Arabic')}}" value="{{$authorization->getTranslation('role','ar')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <x-adminlte-card title="{{__('roles.Permissions')}}" theme="primary">
                            @foreach (config('authorizations.Permissions') as $key => $value)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $key }}"
                                        name="permissions[]" value="{{ $key }}"
                                        {{ in_array($key, $authorization['permissions']) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="permission_{{ $key }}">
                                        {{ $value[app()->getLocale()] }}
                                    </label>
                                </div>
                            @endforeach
                            @error('permissions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </x-adminlte-card>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <x-adminlte-button label="{{__('actions.save')}}" theme="success" icon="fas fa-save" type="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
