@extends('adminlte::page')

@section('title', 'Dashboard/Flash Sales')

@section('content_header')
    <h1>{{__('flashSales.Flash Sales')}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                <a href="{{ route('admin.flash-sales.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{__('actions.create')}}
                </a>
            </div>
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.FlashSales._filter')
            <div>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button disabled class="btn btn-danger" id="delete-selected" data-model="FlashSale">
                        <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                    </button>
                    <x-import-excel :model="'FlashSale'" />
                    <button class="btn btn-warning">
                        <i class="fas fa-file-export"></i> {{ __('actions.export') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[__('flashSales.Name'),__('flashSales.Description'),__('flashSales.Start Date'),__('flashSales.Duration'),__('flashSales.Percentage'),__('flashSales.Status'),__('flashSales.Created Since'),__('flashSales.Last Update')]" />
                <tbody>
                    @forelse($flashSales as $flash)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $flash->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $flash->name }}</td>
                            <td class="text-center">{{ $flash->description }}</td>
                            <td class="text-center">{{ $flash->date }}</td>
                            <td class="text-center">{{ $flash->time }}</td>
                            <td class="text-center">{{ $flash->percentage }}%</td>
                            <td class="text-center">
                                @if($flash->is_active == 1)
                                    <span class="badge badge-success">{{__('flashSales.Active')}}</span>
                                @else
                                    <span class="badge badge-danger">{{__('flashSales.Inactive')}}</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $flash->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $flash->updated_at->diffForHumans()  }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.flash-sales.edit', $flash->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> {{__('actions.edit')}}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                            data-id="{{ $flash->id }}">
                                            <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.flash-sales.destroy', $flash->id) }}"
                                        id="delete-form-{{ $flash->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="11">{{__('flashSales.found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $flashSales->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@stop
