@extends('adminlte::page')

@section('title', 'Dashboard/Contacts')

@section('content_header')
    <h1>{{ __('contacts.Contacts') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('Dashboard.partials.excelValidationErrors')
            @include('Dashboard.Contacts._filter')
            <div>
                <button disabled class="btn btn-danger" id="delete-selected" data-model="ContactUs">
                    <i class="fas fa-trash-alt"></i> {{ __('actions.delete_selected') }}
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <x-table-header :headers="[
                    __('contacts.Name'),
                    __('contacts.Email'),
                    __('contacts.Message'),
                    __('contacts.Sent Since'),
                ]" />
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="row-checkbox" value="{{ $contact->id }}">
                            </td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $contact->name }}</td>
                            <td class="text-center">{{ $contact->email }}</td>
                            <td class="text-center">{{ \Illuminate\Support\Str::limit($contact->message, 30, '...') }}</td>
                            <td class="text-center">{{ $contact->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> {{ __('actions.show') }}
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete-btn"
                                        data-id="{{ $contact->id }}">
                                        <i class="fas fa-trash"></i> {{ __('actions.delete') }}
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                        id="delete-form-{{ $contact->id }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="alert alert-danger text-center" colspan="7">{{ __('contacts.found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {{ $contacts->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@stop
