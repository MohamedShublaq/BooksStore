@extends('adminlte::page')

@section('title', 'Dashboard/Profile')

@section('content_header')
    <h1 class="text-center">{{__('account.Update Profile')}}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.updateProfile') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="name[en]" label="{{__('account.Name English')}}" value="{{$admin->getTranslation('name','en')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="name[ar]" label="{{__('account.Name Arabic')}}" value="{{$admin->getTranslation('name','ar')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="email" type="email" label="{{__('account.Email')}}" value="{{$admin->email}}"
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
