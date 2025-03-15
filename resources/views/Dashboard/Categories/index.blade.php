@extends('adminlte::page')

@section('title', 'Dashboard/Categories')

@section('content_header')
    <h1>{{ __('categories.Categories') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="#" data-toggle="modal" data-target="#addCategory" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{ __('actions.create') }}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.Categories._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="Category">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'Category'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[
                    __('categories.Name'),
                    __('categories.Num of Books'),
                    __('categories.Created Since'),
                    __('categories.Last Update'),
                ]" />
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $category->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $category->name }}</td>
                            <td class="text-center">{{ $category->books_count }}</td>
                            <td class="text-center">{{ $category->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $category->updated_at->diffForHumans()  }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="#" data-toggle="modal" data-target="#editCategory_{{ $category->id }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $category->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                        id="delete-form-{{ $category->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('Dashboard.Categories.edit')
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{__('categories.found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $categories->appends(request()->query())->links() }}
            </div>
        </div>
        @include('Dashboard.Categories.create')
    </div>
@stop
