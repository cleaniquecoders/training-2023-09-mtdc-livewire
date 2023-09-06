<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    @stack('styles')

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="font-sans text-gray-900 dark:text-gray-100 antialiased">

    <div class="min-h-screen">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </div>
    </div>



    @stack('scripts')

</body>

</html>
