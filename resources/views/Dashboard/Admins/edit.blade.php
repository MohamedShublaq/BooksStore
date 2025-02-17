@extends('adminlte::page')

@section('title', 'Dashboard/Admins')

@section('content_header')
    <h1 class="text-center">{{__('admins.Edit Admin')}}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.admins.update' , $admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name[en]" value="{{$admin->getTranslation('name','en')}}" label="{{__('admins.Name English')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name[ar]" value="{{$admin->getTranslation('name','ar')}}" label="{{__('admins.Name Arabic')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="email" type="email" label="{{__('admins.Email')}}" value="{{ $admin->email }}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-select name="role_id" label="{{__('admins.Role')}}" fgroup-class="mb-4" required>
                                @foreach($roles as $role)
                                    <option {{ $admin->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 d-flex justify-content-center">
                            <x-adminlte-button label="{{__('actions.save')}}" theme="success" icon="fas fa-save" type="submit" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
