@extends('layouts.app')

@section('title', __('main.pages.books'))

@section('content')
    <div class="list big-list">
        @foreach(\App\Author::all() as $author)
            <a href="{{ route('author-info', $author->id) }}" class="list-element">
                <div class="list-element-text">{{ $author->first_name }} {{ $author->last_name }}</div>
                <div class="list-relationship-quantity">
                    <div class="quantity-number">
                        {{ \App\Book::all()->where('author_id', $author->id)->count() }}
                    </div>
                    <div class="quantity-caption">{{ __('index.caption_books') }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
