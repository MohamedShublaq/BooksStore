@extends('adminlte::page')

@section('title', 'Dashboard/Authorizations')

@section('content_header')
    <h1>{{__('roles.Authorizations')}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.authorizations.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>{{__('actions.create')}}
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{__('roles.Role')}}</th>
                        <th class="text-center">{{__('roles.Permissions')}}</th>
                        <th class="text-center">{{__('roles.Num of Admins')}}</th>
                        <th class="text-center">{{__('roles.Created Since')}}</th>
                        <th class="text-center">{{__('roles.Last Update')}}</th>
                        <th class="text-center">{{__('actions.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authorizations as $authorization)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $authorization->role }}</td>
                            <td class="text-center">
                                @php
                                    $localizedPermissions = collect($authorization->permissions)
                                        ->map(function ($permission) {
                                            $translations = config('authorizations.Permissions')[$permission] ?? null;
                                            return $translations ? $translations[app()->getLocale()] : null;
                                        })
                                        ->filter()
                                        ->values();
                                @endphp
                                {{ $localizedPermissions->join(', ') }}
                            </td>
                            <td class="text-center">{{ $authorization->admins_count }}</td>
                            <td class="text-center">{{ $authorization->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $authorization->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.authorizations.edit', $authorization->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    @if($authorization->id != 1)
                                        <a href="#" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $authorization->id }}">
                                                <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                        </a>
                                    @endif
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.authorizations.destroy', $authorization->id) }}"
                                        id="delete-form-{{ $authorization->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{__('roles.found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $authorizations->links() }}
            </div>
        </div>
    </div>
@stop
