@extends('layouts.admin')

@section('title', __('admin.pages.authors'))

@section('content')
    <a href="{{ route('admin.author.new') }}" class="btn" style="margin: 0 auto; width: 300px; text-align: center;">{{ __('Add new author') }}</a>
    <div class="list big-list">
        @foreach(\App\Author::all()->sortBy('id') as $author)
            <a href="{{ route('admin.author.info', $author->id) }}" class="list-element">
                <div class="list-element-text">{{ $author->first_name }} {{ $author->last_name }}</div>
                <div class="list-relationship-quantity">
                    <div class="quantity-number">
                        {{ $author->books->count() }}
                    </div>
                    <div class="quantity-caption">{{ __('index.caption_books') }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
