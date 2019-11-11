<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Book Review — @yield('title', 'a big database of books')</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('styles')
    </head>
    <body>
        <header>
            <nav class="top-nav">
                <a>{{ __('main.pages.index') }}</a>
                <a>{{ __('main.pages.authors') }}</a>
                <a>{{ __('main.pages.books') }}</a>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        @stack('scripts')
    </body>
</html>
