@extends('adminlte::page')

@section('title', 'Dashboard/Authors')

@section('content_header')
    <h1>{{ __('authors.Authors') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="#" data-toggle="modal" data-target="#addAuthor" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{ __('actions.create') }}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.Authors._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="Author">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'Author'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[__('authors.Name'), __('authors.Num of Books') , __('authors.Created Since')  , __('authors.Last Update') ]" />
                <tbody>
                    @forelse($authors as $author)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $author->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $author->name }}</td>
                            <td class="text-center">{{ $author->books_count }}</td>
                            <td class="text-center">{{ $author->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $author->updated_at->diffForHumans()  }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="#" data-toggle="modal" data-target="#editAuthor_{{ $author->id }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $author->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.authors.destroy', $author->id) }}"
                                        id="delete-form-{{ $author->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('Dashboard.Authors.edit')
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{ __('authors.found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $authors->appends(request()->query())->links() }}
            </div>
        </div>
        @include('Dashboard.Authors.create')
    </div>
@stop
