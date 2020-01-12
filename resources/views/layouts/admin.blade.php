<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Book Review — @yield('title', 'a big database of books')</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/lists.css') }}">
        @stack('styles')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="top-nav">
                <a href="{{ route('admin.home') }}">{{ __('admin.pages.home') }}</a>
                <a href="{{ route('admin.author.list') }}">{{ __('admin.pages.authors') }}</a>
                <a href="{{ route('admin.book.list') }}">{{ __('admin.pages.books') }}</a>
                <a href="{{ route('admin.user.list') }}">{{ __('admin.pages.users') }}</a>
                <div class="auth-block">
                    <a href="{{ url('/') }}">{{ __('main.pages.index') }}</a>
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        @stack('scripts')
    </body>
</html>
