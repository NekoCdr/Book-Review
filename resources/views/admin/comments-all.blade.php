@extends('layouts.admin')

@section('title', __('main.pages.user'))

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/comments.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        let route_comment_delete = "{{ route('comment.delete') }}";
    </script>
@endpush

@section('content')
    <table style="max-width: 600px;">
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; background: #ccc; width: 100%;">{{ __('Comment List') }}</td>
        </tr>
        @include('admin.comment-list', ['comments_tree' => \App\Comment::all()->sortByDesc('id')])
    </table>
@endsection
