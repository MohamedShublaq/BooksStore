@extends('adminlte::page')

@section('title', 'Dashboard/Shipping Areas')

@section('content_header')
    <h1>{{__('areas.Shipping Areas')}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="#" data-toggle="modal" data-target="#addShippingArea" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{ __('actions.create') }}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.ShippingAreas._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="ShippingArea">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'ShippingArea'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[__('areas.Name') , __('areas.Fee') , __('areas.Created Since') , __('areas.Last Update')]" />
                <tbody>
                    @forelse($shippingAreas as $shippingArea)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $shippingArea->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $shippingArea->name }}</td>
                            <td class="text-center">{{ $shippingArea->fee }}</td>
                            <td class="text-center">{{ $shippingArea->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $shippingArea->updated_at->diffForHumans()  }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="#" data-toggle="modal" data-target="#editShippingArea_{{ $shippingArea->id }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $shippingArea->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.shipping-areas.destroy', $shippingArea->id) }}"
                                        id="delete-form-{{ $shippingArea->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('Dashboard.ShippingAreas.edit')
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{__('areas.found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $shippingAreas->appends(request()->query())->links() }}
            </div>
        </div>
        @include('Dashboard.ShippingAreas.create')
    </div>
@stop
