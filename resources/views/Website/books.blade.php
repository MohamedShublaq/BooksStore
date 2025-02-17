@extends('Website.Layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/books.css') }}" />
@endpush

@section('title', 'Library')

@section('content')
    <section class="library my-5">
        <div class="container">
            @livewire('parent-books-page' , ['categories' => $categories])
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/website/js/books.js') }}"></script>
@endpush
