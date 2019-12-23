@extends('layouts.app')

@section('title', __('main.pages.books'))

@section('content')
    <div class="list big-list">
        @foreach(\App\Book::all() as $book)
            <a href="{{ route('book-info', $book->id) }}" class="list-element">
                <div class="list-element-text">{{ $book->title }}</div>
                <div class="list-relationship-quantity">
                    <div class="quantity-number">
                        {{ \App\Comment::all()->where('book_id', $book->id)->count() }}
                    </div>
                    <div class="quantity-caption">{{ __('index.caption_comments') }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
