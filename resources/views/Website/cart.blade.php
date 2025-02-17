@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/cart.css') }}" />
@endpush

@section('title', 'Cart')

@section('content')
    @livewire('cart-page', ['books' => $books])
@endsection
