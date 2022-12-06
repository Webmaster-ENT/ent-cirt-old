<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('partials.header')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if (Request::is('article') || Request::is('report') || Request::is('dashboard'))
            @include('partials.sidebar')
        @endif

        <!-- Page Heading -->
        {{--  @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif  --}}

        <!-- Page Content -->
        @if (Request::is('article') || Request::is('report') || Request::is('dashboard'))
            <main
                class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
                {{--  @include('layouts.navigation')  --}}
                @include('partials.navbar')
                {{ $slot }}
            </main>
        @else
            <main class="">
                @include('partials.navbar')
                {{ $slot }}
            </main>
        @endif
    </div>
    @include('partials.footer-link')
</body>

</html>
