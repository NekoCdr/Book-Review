@extends('layouts.admin')

@section('title', __('admin.pages.books'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/comments.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        let route_book_create = "{{ route('admin.book.create') }}";
    </script>
@endpush

@section('content')
    <table style="max-width: 600px;">
        <tr>
            <td style="width: 100px;">{{ __('book.title') }}:</td>
            <td style="font-weight: bold; width: 494px;">
                <input id="title" type="text" value="">
            </td>
        </tr>
        <tr>
            <td>{{ __('book.author') }}:</td>
            <td>
                <select id="author_id" style="display: block;">
                    @foreach(\App\Author::all()->sortBy('id') as $option)
                        <option value="{{ $option->id }}" @if(!empty($author_id) && $option->id == $author_id) selected @endif>{{ $option->first_name }} {{ $option->last_name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">{{ __('book.description') }}:</td>
            <td>
                <textarea style="width: 100%; height: 70px;" id="description-area"></textarea>
            </td>
        </tr>
        <tr class="tr-button book-create">
            <td colspan="2">
                {{ __('Save') }}
            </td>
        </tr>
    </table>
@endsection
