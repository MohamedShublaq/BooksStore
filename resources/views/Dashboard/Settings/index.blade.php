@extends('adminlte::page')

@section('title', 'Dashboard/Settings')

@section('content_header')
    <h1 class="text-center">{{ __('settings.Update Settings') }}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.updateSettings') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.Email') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="email" value="{{$settings->email}}" type="email" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.Phone') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="phone" value="{{$settings->phone}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.Address') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="address" value="{{$settings->address}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.TaxPercentage') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="tax_percentage" value="{{$settings->tax_percentage}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.Facebook') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="facebook" value="{{$settings->facebook}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.Instagram') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="instagram" value="{{$settings->instagram}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.Youtube') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="youtube" value="{{$settings->youtube}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                {{ __('settings.X') }} <span style="color: red;">*</span>
                            </label>
                            <x-adminlte-input name="x" value="{{$settings->x}}" type="text" fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <x-adminlte-button label="{{ __('actions.save') }}" theme="success" icon="fas fa-save"
                            type="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
