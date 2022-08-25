<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title.' | '.config('app.name') }}</title>

        @vite('resources/css/app.css')

        <script src="https://unpkg.com/alpinejs@3" defer></script>
        @stack('scripts')
    </head>

    <body class="antialiased font-sans bg-gray-100">
        <main class="flex min-h-screen flex-col py-6 sm:py-12">
            {{ $slot }}
        </main>
    </body>
</html>
