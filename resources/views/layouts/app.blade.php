<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SchoolManager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles personnalisés -->
    <style>
        /* Animation de chargement pour les transitions */
        .page-transition-enter {
            opacity: 0;
            transform: translateY(10px);
        }
        .page-transition-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 200ms, transform 200ms;
        }
        /* Personnalisation de la scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
        /* Assurer que le contenu principal prend tout l'espace disponible entre header et footer */
        .app-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main-content-wrapper {
            flex: 1;
            display: flex;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Overlay de chargement -->
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)" class="fixed inset-0 z-50 flex items-center justify-center bg-white" x-show="loading" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 border-4 border-indigo-600 border-t-transparent rounded-full animate-spin"></div>
            <p class="mt-4 text-gray-700">Chargement...</p>
        </div>
    </div>

    <!-- Layout principal avec flexbox pour distribuer correctement l'espace -->
    <div class="app-container" x-data="{ sidebarOpen: true }">
        <!-- Header fixe -->
        @include('components.header')

        <!-- Wrapper du contenu et sidebar -->
        <div class="main-content-wrapper">
            @auth
                <!-- Sidebar avec position fixe -->
                <div class="transition-all duration-300 ease-in-out h-screen sticky top-20"
                    :class="sidebarOpen ? 'w-72' : 'w-20'">
                    @include('components.sidebar')
                </div>

                <!-- Contenu principal avec adaptation de la marge selon l'état de la sidebar -->
                <main class="flex-1 transition-all duration-300 ease-in-out"
                    x-data="{ pageLoaded: false }"
                    x-init="setTimeout(() => pageLoaded = true, 600)">

                    <!-- Effet de transition au chargement -->
                    <div x-show="pageLoaded"
                        x-transition:enter="page-transition-enter"
                        x-transition:enter-active="page-transition-enter-active"
                        class="py-6 px-6 sm:px-8 min-h-[calc(100vh-5rem-16rem)]">
                        {{ $slot }}
                    </div>
                </main>
            @else
                <!-- Contenu principal sans sidebar (visiteur non connecté) -->
                <main class="flex-1 min-h-[calc(100vh-5rem-16rem)]">
                    {{ $slot }}
                </main>
            @endauth
        </div>

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Scripts supplémentaires -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Observateur pour animer les éléments au scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeIn');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            // Appliquer l'observateur aux sections principales
            document.querySelectorAll('section, .card, .dashboard-item').forEach(el => {
                el.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                observer.observe(el);
            });

            // Synchroniser l'état de la sidebar entre les composants
            window.addEventListener('sidebar-toggle', event => {
                window.Alpine.store('sidebar', { open: event.detail.open });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
