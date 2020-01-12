@extends('layouts.app')

@section('title', __('main.pages.books'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/comments.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        let route_comment_create = "{{ route('comment.create') }}";
        let route_comment_delete = "{{ route('comment.delete') }}";
        let book_id = "{{ $book->id }}";
    </script>
@endpush

@section('content')
    <table style="max-width: 600px;">
        <tr>
            <td>{{ __('book.title') }}:</td>
            <td style="font-weight: bold">{{ $book->title }}</td>
        </tr>
        <tr>
            <td>{{ __('book.author') }}:</td>
            <td><a href="{{ route('author.info', $book->author->id) }}" style="color: blue; font-weight: bold;">{{ $book->author->first_name }} {{ $book->author->last_name }}</a></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">{{ __('book.description') }}:</td>
            <td>{{ $book->description }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; background: #ccc;">{{ __('Comments') }}</td>
        </tr>
        @includeWhen($comments_tree, 'helpers.comment', ['comments_tree' => $comments_tree])
        @auth
            <tr>
                <td colspan="2">
                    <div class="leave-comment">
                        <a class="leave-comment-title">&gt; {{ __('Leave a comment') }} &lt;</a>
                    </div>
                </td>
            </tr>
        @endauth
    </table>
@endsection
