@extends('adminlte::page')

@section('title', 'Dashboard/User Addresses')

@section('content_header')
    <h1>{{ __('users.Addresses') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('users.address') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($addresses as $address)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $address->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="2">{{ __('users.foundAddress') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $addresses->links() }}
            </div>
        </div>
    </div>
@stop
