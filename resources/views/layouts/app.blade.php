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
    @stack('styles')
    @include('partials.header')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if (Request::is('admin/article') ||
            Request::is('admin/report') ||
            Request::is('admin/dashboard') ||
            Request::is('admin/report/done'))
            @include('partials.sidebar')
        @endif

        <!-- Page Content -->

        @if (Request::is('admin/article') ||
            Request::is('admin/report') ||
            Request::is('admin/dashboard') ||
            Request::is('admin/report/done'))
            <main class="ease-soft-in-out xl:ml-68.5 relative rounded-xl transition-all duration-200">
                {{--  @include('layouts.navigation')  --}}
                @include('partials.navbar')
                {{ $slot }}
            </main>
        @else
            <main>
                @include('partials.navbar')
                {{ $slot }}
            </main>
        @endif
    </div>
    @stack('scripts')
    @include('partials.footer-link')
</body>

</html>
