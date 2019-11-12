@extends('layouts.app')

@section('title', __('main.pages.books'))

@section('content')
    <table style="max-width: 600px;">
        <tr>
            <td>{{ __('book.title') }}}:</td>
            <td style="font-weight: bold">{{ $book->title }}</td>
        </tr>
        <tr>
            <td>{{ __('book.author') }}:</td>
            <td><a href="{{ route('author-info', $author->id) }}" style="color: blue; font-weight: bold;">{{ $author->first_name }} {{ $author->last_name }}</a></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">{{ __('book.description') }}:</td>
            <td>{{ $book->description }}</td>
        </tr>
    </table>
@endsection
