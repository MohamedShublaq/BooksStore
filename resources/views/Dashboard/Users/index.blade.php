@extends('adminlte::page')

@section('title', 'Dashboard/Users')

@section('content_header')
    <h1>{{ __('users.Users') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('Dashboard.Users._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="User">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[__('users.firstName'), __('users.lastName'), __('users.email'), __('users.phone') ]" />
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $user->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $user->first_name }}</td>
                            <td class="text-center">{{ $user->last_name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->phone }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i> {{ __('users.Addresses') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $user->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                        id="delete-form-{{ $user->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{ __('users.found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@stop
