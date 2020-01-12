@extends('layouts.admin')

@section('title', __('admin.pages.home'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@section('content')
    <div class="site-description">
        This is an Admin Panel.
    </div>
    <div class="latest-entries">
        <div class="list twin-list">
            <div class="list-title">{{ __('Latest comments') }}</div>
            @forelse(\App\Comment::all()->sortByDesc('id')->take(5) as $comment)
                <a href="{{ route('admin.book.info', $comment->book_id) }}#comment_{{ $comment->id }}" class="list-element">
                    <div class="list-element-text">{{ $comment->comment }}</div>
                </a>
            @empty
                <div class="list-element">
                    <div class="list-element-text" style="width: 100%; text-align: center;">{{ __('No comments') }}</div>
                </div>
            @endforelse
            <a href="{{ route('admin.comment.list') }}" class="full-list-link">&gt; {{ __('All comments') }} &lt;</a>
        </div>
    </div>
@endsection
