@extends('adminlte::page')

@section('title', 'Dashboard/Admins')

@section('content_header')
    <h1>{{ __('admins.Admins') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.admins.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>{{ __('actions.create') }}
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('admins.Name') }}</th>
                        <th class="text-center">{{ __('admins.Email') }}</th>
                        <th class="text-center">{{ __('admins.Role') }}</th>
                        <th class="text-center">{{ __('admins.Created Since') }}</th>
                        <th class="text-center">{{ __('admins.Last Update') }}</th>
                        <th class="text-center">{{ __('actions.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $admin->name }}</td>
                            <td class="text-center">{{ $admin->email }}</td>
                            <td class="text-center">{{ $admin->authorization->role }}</td>
                            <td class="text-center">{{ $admin->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $admin->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $admin->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}"
                                        id="delete-form-{{ $admin->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{__('admins.found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $admins->links() }}
            </div>
        </div>
    </div>
@stop
