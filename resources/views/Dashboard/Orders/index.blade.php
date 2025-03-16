@extends('adminlte::page')

@section('title', 'Dashboard/Orders')

@section('content_header')
    <h1>{{ __('orders.Orders') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('Dashboard.Orders._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="Order">
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
                <x-table-header :headers="
                    [
                        __('orders.number'),
                        __('users.firstName'),
                        __('users.lastName'),
                        __('users.email'),
                        __('users.phone'),
                        __('orders.booksTotal'),
                        __('orders.shippingFee'),
                        __('orders.taxAmount'),
                        __('orders.total'),
                        __('orders.shippingArea'),
                        __('orders.address'),
                        __('orders.paymentType'),
                        __('orders.paymentStatus'),
                    ]
                " />
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $order->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $order->number }}</td>
                            <td class="text-center">{{ $order->user?->first_name }}</td>
                            <td class="text-center">{{ $order->user?->last_name }}</td>
                            <td class="text-center">{{ $order->user?->email }}</td>
                            <td class="text-center">{{ $order->user?->phone }}</td>
                            <td class="text-center">{{ $order->books_total }}</td>
                            <td class="text-center">{{ $order->shipping_fee }}</td>
                            <td class="text-center">{{ $order->tax_amount }}</td>
                            <td class="text-center">{{ $order->total }}</td>
                            <td class="text-center">{{ $order->shippingArea?->name }}</td>
                            <td class="text-center">{{ $order->address?->address }}</td>
                            <td class="text-center">
                                {{ $order->payment_type == App\Enums\PaymentType::Cash ? __('orders.cash') : __('orders.visa') }}
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $order->payment_status == App\Enums\PaymentStatus::Paid ? 'badge-success' : 'badge-danger' }}">
                                    {{ $order->payment_status == App\Enums\PaymentStatus::Paid ? __('orders.paid') : __('orders.unpaid') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i> {{ __('orders.Details') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $order->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                        id="delete-form-{{ $order->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="16">{{ __('orders.found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@stop
