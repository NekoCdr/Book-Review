@extends('layouts.admin')

@section('title', __('admin.pages.authors'))

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        let route_author_create = "{{ route('admin.author.create') }}";
    </script>
@endpush

@section('content')
    <table style="max-width: 600px;">
        <tr>
            <td style="width: 100px;">{{ __('author.last_name') }}:</td>
            <td style="width: 494px;">
                <input id="last_name" type="text" value="">
            </td>
        </tr>
        <tr>
            <td>{{ __('author.first_name') }}:</td>
            <td>
                <input id="first_name" type="text" value="">
            </td>
        </tr>
        <tr>
            <td>{{ __('author.birth_date') }}:</td>
            <td>
                <input id="birthday" type="date" value="">
            </td>
        </tr>
        <tr class="tr-button author-create">
            <td colspan="2">
                {{ __('Save') }}
            </td>
        </tr>
    </table>
@endsection
