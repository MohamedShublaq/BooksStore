@extends('adminlte::page')

@section('title', 'Dashboard/Publishers')

@section('content_header')
    <h1>{{ __('publishers.Publishers') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="#" data-toggle="modal" data-target="#addPublisher" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{ __('actions.create') }}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.Publishers._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="Publisher">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'Publisher'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[__('publishers.Name'), __('publishers.Num of Books')]" />
                <tbody>
                    @forelse($publishers as $publisher)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $publisher->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $publisher->name }}</td>
                            <td class="text-center">{{ $publisher->books_count }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="#" data-toggle="modal" data-target="#editPublisher_{{ $publisher->id }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $publisher->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.publishers.destroy', $publisher->id) }}"
                                        id="delete-form-{{ $publisher->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('Dashboard.Publishers.edit')
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="5">{{ __('publishers.found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $publishers->appends(request()->query())->links() }}
            </div>
        </div>
        @include('Dashboard.Publishers.create')
    </div>
@stop
