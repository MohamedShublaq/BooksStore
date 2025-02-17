@extends('adminlte::page')

@section('title', 'Dashboard/Books')

@section('content_header')
    <h1>{{ __('books.Books') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="{{ route('admin.books.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{ __('actions.create') }}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.Books._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="Book">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'Book'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[
                    __('books.Name'),
                    __('books.Quantity'),
                    __('books.Viewers'),
                    __('books.Price'),
                    __('books.Availability'),
                    __('books.Category'),
                    __('books.Publisher'),
                    __('books.Authors'),
                    __('books.Discountable'),
                ]" />
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $book->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $book->name }}</td>
                            <td class="text-center">{{ $book->quantity }}</td>
                            <td class="text-center">{{ $book->num_of_viewers }}</td>
                            <td class="text-center">{{ $book->price }}</td>
                            <td class="text-center">
                                @if ($book->is_available == 1)
                                    <span class="badge badge-success">{{ __('books.Available') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('books.Unavailable') }}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $book->category->name }}</td>
                            <td class="text-center">{{ $book->publisher->name }}</td>
                            <td class="text-center">
                                @foreach ($book->authors as $author)
                                    {{ $author->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if ($book->discountable)
                                    @if ($book->discountable_type === 'App\Models\Discount')
                                        {{ __('books.Discount') }}
                                        => {{ $book->discountable->code }} ({{ $book->discountable->percentage }}) %
                                    @elseif($book->discountable_type === 'App\Models\FlashSale')
                                        {{ __('books.Flash Sale') }} => {{ $book->discountable->name }}
                                        ({{ $book->discountable->percentage }})
                                        %
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.books.show', $book->slug) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i> {{ __('actions.show') }}
                                    </a>
                                    <a href="{{ route('admin.books.edit', $book->slug) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $book->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.books.destroy', $book->id) }}"
                                        id="delete-form-{{ $book->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="alert alert-danger text-center" colspan="13">{{ __('books.found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><br>
                <div class="d-flex justify-content-center">
                    {{ $books->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    @stop
