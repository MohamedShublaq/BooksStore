@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/wishlist.css') }}" />
@endpush

@section('title', 'Wishlist')

@section('content')
    @livewire('wishlist-page' , ['books' => $books])
@endsection
