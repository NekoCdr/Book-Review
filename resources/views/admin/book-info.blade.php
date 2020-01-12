@extends('layouts.admin')

@section('title', __('admin.pages.books'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/comments.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        let route_comment_create = "{{ route('comment.create') }}";
        let route_comment_delete = "{{ route('admin.comment.delete') }}";
        let route_book_delete = "{{ route('admin.book.delete') }}";
        let route_book_update = "{{ route('admin.book.update') }}";
        let book_id = "{{ $book->id }}";
    </script>
@endpush

@section('content')
    <table style="max-width: 600px;">
        <tr>
            <td style="width: 100px;">{{ __('book.title') }}:</td>
            <td style="font-weight: bold; width: 494px;">
                <input id="title" class="edited-data" type="text" value="{{ $book->title }}" disabled>
            </td>
        </tr>
        <tr>
            <td>{{ __('book.author') }}:</td>
            <td>
                <a href="{{ route('admin.author.info', $book->author->id) }}" style="color: blue; font-weight: bold;">{{ $book->author->first_name }} {{ $book->author->last_name }}</a>
                <select id="author_id" class="edited-data" style="display: block;" disabled>
                    @foreach(\App\Author::all()->sortBy('id') as $option)
                        <option value="{{ $option->id }}" @if($option->id == $book->author->id) selected @endif>{{ $option->first_name }} {{ $option->last_name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">{{ __('book.description') }}:</td>
            <td>
                <div id="description-text">{{ $book->description }}</div>
                <textarea style="display:none; width: 100%; height: 70px;" id="description-area" class="edited-data">{{ $book->description }}</textarea>
            </td>
        </tr>
        <tr class="tr-button book-edit">
            <td colspan="2">
                {{ __('Edit Info') }}
            </td>
        </tr>
        <tr style="display: none;" class="tr-button btn-save book-save">
            <td colspan="2">
                {{ __('Save') }}
            </td>
        </tr>
        <tr style="display: none;" class="tr-button btn-cancel book-cancel">
            <td colspan="2">
                {{ __('Cancel editing') }}
            </td>
        </tr>
        <tr class="tr-button book-delete">
            <td colspan="2">{{ __('Delete this book') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; background: #ccc;">{{ __('Comments') }}</td>
        </tr>
        @includeWhen($comments_tree, 'admin.comment', ['comments_tree' => $comments_tree])
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
