@extends('adminlte::page')

@section('title', 'Dashboard/Admins')

@section('content_header')
    <h1 class="text-center">{{__('admins.Create New Admin')}}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.admins.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name[en]" label="{{__('admins.Name English')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name[ar]" label="{{__('admins.Name Arabic')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="email" type="email" label="{{__('admins.Email')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-select name="role_id" label="{{__('admins.Role')}}" fgroup-class="mb-4" req>
                                <option disabled selected value="">{{__('actions.choose')}}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="password" type="password" label="{{__('admins.Password')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="password_confirmation" type="password" label="{{__('admins.Confirm Password')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
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
