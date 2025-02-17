@extends('adminlte::page')

@section('title', 'Dashboard/Change Password')

@section('content_header')
    <h1 class="text-center">{{__('account.Change Password')}}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.changePassword') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="old_password" type="password" label="{{__('account.Old Password')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="password" type="password" label="{{__('account.New Password')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="password_confirmation" type="password" label="{{__('account.Confirm Password')}}"
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
