<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

        <title>Book Review — @yield('title', 'a big database of books')</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lists.css') }}">
        @stack('styles')
    </head>
    <body>
        <header>
            <nav class="top-nav">
                <a href="/">{{ __('main.pages.index') }}</a>
                <a href="{{ route('authors') }}">{{ __('main.pages.authors') }}</a>
                <a href="{{ route('books') }}">{{ __('main.pages.books') }}</a>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        @stack('scripts')
    </body>
</html>
