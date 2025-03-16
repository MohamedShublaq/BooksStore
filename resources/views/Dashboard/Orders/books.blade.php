@extends('adminlte::page')

@section('title', 'Dashboard/Order Items')

@section('content_header')
    <h1>{{ __('orders.Items') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('orders.bookName') }}</th>
                        <th class="text-center">{{ __('orders.originalPrice') }}</th>
                        <th class="text-center">{{ __('orders.priceAfterDiscount') }}</th>
                        <th class="text-center">{{ __('orders.appliedDiscount') }}</th>
                        <th class="text-center">{{ __('orders.quantity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $book->book->name }}</td>
                            <td class="text-center">{{ $book->original_price }}</td>
                            <td class="text-center">{{ $book->price_after_discount }}</td>
                            <td class="text-center">{{ $book->applied_discount }}</td>
                            <td class="text-center">{{ $book->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@stop
