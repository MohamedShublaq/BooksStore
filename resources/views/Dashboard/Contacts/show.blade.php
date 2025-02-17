@extends('adminlte::page')

@section('title', 'Dashboard/Contacts')

@section('content_header')
    <h1>{{__('contacts.Show Contact')}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-adminlte-input disabled name="name" label="{{__('contacts.Name')}}" value="{{$contact->name}}" fgroup-class="mb-4"
                            required>
                        </x-adminlte-input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-adminlte-input disabled name="email" type="email" label="{{__('contacts.Email')}}" value="{{$contact->email}}"
                            fgroup-class="mb-4" required>
                        </x-adminlte-input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-adminlte-textarea disabled name="message" label="{{__('contacts.Message')}}"
                            fgroup-class="mb-4" rows="5" required>
                            {{ $contact->message }}
                        </x-adminlte-textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
