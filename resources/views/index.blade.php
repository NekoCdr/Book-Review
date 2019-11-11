@extends('layouts.app')

@section('title', __('main.pages.index'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@section('content')
    <div class="site-description">
        This is a "Book Review" site.
    </div>
@endsection
