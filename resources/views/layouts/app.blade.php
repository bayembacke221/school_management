<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'School Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased bg-gray-100">
<div x-data="{ sidebarOpen: true }" class="relative min-h-screen md:flex">
    <!-- Barre latérale -->
    @include('layouts.sidebar')

    <!-- Contenu principal -->
    <div class="flex-1 h-screen overflow-y-auto">
        <!-- Contenu principal -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>

@vite(['resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>
</html>
