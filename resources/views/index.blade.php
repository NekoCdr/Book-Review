@extends('layouts.app')

@section('title', __('main.pages.index'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@section('content')
    <div class="site-description">
        This is a "Book Review" site.
    </div>
    <div class="latest-entries">
        <div class="list twin-list">
            <div class="list-title">{{ __('index.latest_authors') }}</div>
            @foreach(\App\Author::all()->sortByDesc('id')->take(5) as $author)
                <a class="list-element">
                    <div class="list-element-text">{{ $author->first_name }} {{ $author->last_name }}</div>
                    <div class="list-relationship-quantity">
                        <div class="quantity-number">
                            {{ \App\Book::all()->where('author_id', $author->id)->count() }}
                        </div>
                        <div class="quantity-caption">{{ __('index.caption_books') }}</div>
                    </div>
                </a>
            @endforeach
            <a class="full-list-link">&gt; {{ __('index.all_authors') }} &lt;</a>
        </div>
        <div class="list twin-list">
            <span class="list-title">{{ __('index.latest_books') }}</span>
            @foreach(\App\Book::all()->sortByDesc('id')->take(5) as $book)
                <a class="list-element">
                    <div class="list-element-text">{{ $book->title }}</div>
                    <div class="list-relationship-quantity">
                        <div class="quantity-number">
                            {{ \App\Comment::all()->where('book_id', $book->id)->count() }}
                        </div>
                        <div class="quantity-caption">{{ __('index.caption_comments') }}</div>
                    </div>
                </a>
            @endforeach
            <a class="full-list-link">&gt; {{ __('index.all_books') }} &lt;</a>
        </div>
    </div>
@endsection
