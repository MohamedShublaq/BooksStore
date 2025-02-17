@extends('adminlte::page')

@section('title', 'Dashboard/FlashSales')

@section('content_header')
    <h1 class="text-center">{{ __('flashSales.Create New Flash Sale') }}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.flash-sales.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name[en]" label="{{ __('flashSales.Name English') }}" type="text"
                                fgroup-class="mb-4">
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name[ar]" label="{{ __('flashSales.Name Arabic') }}" type="text"
                                fgroup-class="mb-4">
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-textarea name="description[en]" label="{{ __('flashSales.Description English') }}"
                                fgroup-class="mb-4" rows="5">
                            </x-adminlte-textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-textarea name="description[ar]" label="{{ __('flashSales.Description Arabic') }}"
                                fgroup-class="mb-4" rows="5">
                            </x-adminlte-textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="date" label="{{ __('flashSales.Start Date') }}" type="datetime-local"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="time" label="{{ __('flashSales.Duration') }}" fgroup-class="mb-4"
                                required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="percentage" label="{{ __('flashSales.Percentage') }}%" type="text"
                                fgroup-class="mb-4" required>
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
