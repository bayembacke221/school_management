<header class="bg-white shadow-lg border-b border-gray-100 sticky top-0 z-50 h-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo avec animation sur hover -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center group">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-2 rounded-lg shadow-md mr-2 transition-all duration-300 group-hover:shadow-indigo-200 group-hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-700">School</span>
                    <span class="text-2xl font-bold text-gray-800">Manager</span>
                </a>
            </div>

            <!-- Navigation Desktop -->
            <nav class="hidden sm:flex sm:space-x-1 sm:items-center">
                @auth
                    <!-- Afficher les liens de navigation seulement si non connecté -->
                @else
                    <a href="#" class="relative group px-4 py-2 rounded-lg text-gray-600 hover:text-gray-900 font-medium transition-all duration-200 hover:bg-gray-50">
                        Accueil
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                    </a>
                    <a href="#" class="relative group px-4 py-2 rounded-lg text-gray-600 hover:text-gray-900 font-medium transition-all duration-200 hover:bg-gray-50">
                        À propos
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                    </a>
                    <a href="#" class="relative group px-4 py-2 rounded-lg text-gray-600 hover:text-gray-900 font-medium transition-all duration-200 hover:bg-gray-50">
                        Contact
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                    </a>

                    <!-- Séparateur visuel avant les boutons d'action -->
                    <span class="h-6 w-px bg-gray-200 mx-2"></span>
                @endauth

                @auth
                    <!-- Menu déroulant de l'utilisateur connecté -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" class="flex items-center space-x-2 bg-white text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium border border-gray-200 hover:border-indigo-200 transition-colors duration-200 focus:outline-none">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-semibold mr-2">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                    <span>{{ auth()->user()->name }}</span>
                                </div>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 overflow-hidden z-50">
                            <div class="py-2 bg-gradient-to-r from-indigo-600 to-blue-700 text-white px-4">
                                <p class="text-sm">Connecté en tant que</p>
                                <p class="text-sm font-bold">{{ auth()->user()->role }}</p>
                            </div>
                            <div class="py-1">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                                    <svg class="mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                    Paramètres
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700">
                                        <svg class="mr-3 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5-5H3zm7 2v3.586l3.586 3.586H10a1 1 0 01-1-1V5z" clip-rule="evenodd" />
                                            <path d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5-5H3zm7 2v3.586l3.586 3.586H10a1 1 0 01-1-1V5z" />
                                        </svg>
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:shadow-md hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 transform hover:scale-105 shadow-sm flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Connexion
                    </a>
                @endauth
            </nav>

            <!-- Mobile menu button avec animation -->
            <div class="flex items-center sm:hidden">
                @auth
                    <!-- Pour les utilisateurs connectés: bouton de navigation du profil seulement -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 bg-white text-gray-700 hover:text-indigo-600 p-2 rounded-lg text-sm font-medium border border-gray-200 hover:border-indigo-200 transition-colors duration-200 focus:outline-none">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-semibold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </button>

                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 overflow-hidden z-50">
                            <div class="py-2 bg-gradient-to-r from-indigo-600 to-blue-700 text-white px-4">
                                <p class="text-sm">Connecté en tant que</p>
                                <p class="text-sm font-bold">{{ auth()->user()->role }}</p>
                            </div>
                            <div class="py-1">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                                    <svg class="mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                    Paramètres
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700">
                                        <svg class="mr-3 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5-5H3zm7 2v3.586l3.586 3.586H10a1 1 0 01-1-1V5z" clip-rule="evenodd" />
                                        </svg>
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Pour les visiteurs: bouton du menu mobile complet -->
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile menu seulement pour les visiteurs -->
    @guest
    <div class="sm:hidden hidden mobile-menu transform transition-all duration-300 ease-in-out" id="mobile-menu">
        <div class="px-4 pt-2 pb-3 space-y-1 bg-white shadow-lg rounded-b-lg border-t border-gray-100">
            <a href="#" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-700 hover:bg-indigo-50 transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Accueil
                </div>
            </a>
            <a href="#" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-700 hover:bg-indigo-50 transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    À propos
                </div>
            </a>
            <a href="#" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-700 hover:bg-indigo-50 transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact
                </div>
            </a>

            <div class="pt-4 mt-2 border-t border-gray-100">
                <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-indigo-800 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Connexion
                </a>
            </div>
        </div>
    </div>
    @endguest
</header>

@push('scripts')
<script>
    // Animation améliorée du menu mobile (seulement pour les visiteurs)
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');

                // Ajout d'une animation supplémentaire
                if(!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('opacity-0');
                    setTimeout(() => {
                        mobileMenu.classList.remove('opacity-0');
                        mobileMenu.classList.add('opacity-100');
                    }, 10);
                } else {
                    mobileMenu.classList.remove('opacity-100');
                    mobileMenu.classList.add('opacity-0');
                }
            });
        }
    });
</script>
@endpush
