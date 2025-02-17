@extends('adminlte::page')

@section('title', 'Dashboard/Discounts')

@section('content_header')
    <h1>{{__('discounts.Discounts')}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="{{ route('admin.discounts.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{__('actions.create')}}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.Discounts._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="Discount">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'Discount'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[__('discounts.Code'), __('discounts.Quantity'), __('discounts.Percentage'), __('discounts.Expiry Date'), __('discounts.Status'), __('discounts.Created Since'), __('discounts.Last Update')]" />
                <tbody>
                    @forelse($discounts as $discount)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $discount->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $discount->code }}</td>
                            <td class="text-center">{{ $discount->quantity }}</td>
                            <td class="text-center">{{ $discount->percentage }}%</td>
                            <td class="text-center">{{ $discount->expiry_date }}</td>
                            <td class="text-center">
                                @if($discount->is_active == 1)
                                    <span class="badge badge-success">{{__('discounts.Active')}}</span>
                                @else
                                    <span class="badge badge-danger">{{__('discounts.Inactive')}}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $discount->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $discount->updated_at->diffForHumans()  }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.discounts.edit', $discount->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{__('actions.edit')}}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                            data-id="{{ $discount->id }}">
                                            <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.discounts.destroy', $discount->id) }}"
                                        id="delete-form-{{ $discount->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="10">{{__('discounts.found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $discounts->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@stop
