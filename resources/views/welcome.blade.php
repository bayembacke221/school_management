<x-app-layout>
    <!-- Hero Section avec animation et design moderne -->
    <section class="relative bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white py-36 overflow-hidden">
        <!-- Formes décoratives animées -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -left-10 top-20 w-40 h-40 rounded-full bg-white opacity-10 animate-pulse"></div>
            <div class="absolute right-20 top-40 w-60 h-60 rounded-full bg-indigo-300 opacity-10 animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute left-1/3 bottom-20 w-20 h-20 rounded-full bg-blue-300 opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">Gestion Scolaire</span>
                </h1>
                <p class="text-xl md:text-2xl mb-10 font-light max-w-2xl mx-auto text-blue-100">
                    Plateforme de gestion interne pour optimiser le suivi des élèves et l'organisation scolaire
                </p>
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="bg-white text-indigo-700 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 transform hover:scale-105 shadow-lg inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Se connecter
                    </a>
                </div>
            </div>
        </div>

        <!-- Vague décorative en bas du hero -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#f3f4f6">
                <path d="M0,96L60,80C120,64,240,32,360,32C480,32,600,64,720,80C840,96,960,96,1080,88C1200,80,1320,64,1380,56L1440,48L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section amélioré avec hover effects et icônes modernes -->
    <section id="features" class="py-28 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Notre système de gestion</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
                <p class="mt-6 text-gray-600 max-w-3xl mx-auto">Une solution complète pour gérer efficacement tous les aspects de votre établissement scolaire</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Gestion des élèves -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:translate-y-[-5px] border border-gray-100">
                    <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 mx-auto md:mx-0">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Gestion des élèves</h3>
                    <p class="text-gray-600 leading-relaxed">Suivi complet des informations personnelles, des performances académiques et de l'assiduité des élèves dans une interface intuitive.</p>
                    <div class="mt-6 w-10 h-1 bg-indigo-600"></div>
                </div>

                <!-- Gestion des cours -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:translate-y-[-5px] border border-gray-100">
                    <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 mx-auto md:mx-0">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Gestion des cours</h3>
                    <p class="text-gray-600 leading-relaxed">Organisation et suivi des cours, des emplois du temps et des ressources pédagogiques avec des outils de planification avancés.</p>
                    <div class="mt-6 w-10 h-1 bg-indigo-600"></div>
                </div>

                <!-- Gestion des évaluations -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:translate-y-[-5px] border border-gray-100">
                    <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 mx-auto md:mx-0">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Gestion des évaluations</h3>
                    <p class="text-gray-600 leading-relaxed">Système complet de gestion des notes, des bulletins et des rapports pour assurer un suivi transparent de la progression des élèves.</p>
                    <div class="mt-6 w-10 h-1 bg-indigo-600"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section redesign -->
    <section class="bg-white py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-indigo-600 to-blue-700 rounded-3xl p-12 shadow-xl text-center text-white relative overflow-hidden">
                <!-- Éléments décoratifs -->
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-white opacity-10"></div>
                    <div class="absolute -left-10 -bottom-10 w-40 h-40 rounded-full bg-indigo-300 opacity-10"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Besoin d'aide ?</h2>
                    <p class="text-xl mb-8 font-light">Contactez l'administrateur système pour toute assistance ou demande d'information.</p>
                    <div class="inline-flex items-center justify-center px-6 py-3 bg-white text-indigo-700 rounded-lg font-medium">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        admin@schoolmanager.com
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer ajouté -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <h3 class="font-bold text-xl">Gestion Scolaire</h3>
                    <p class="text-gray-400 mt-2">© 2025 Tous droits réservés</p>
                </div>
                <div class="flex space-x-8">
                    <a href="#" class="text-gray-300 hover:text-white transition">Mentions légales</a>
                    <a href="#" class="text-gray-300 hover:text-white transition">Confidentialité</a>
                    <a href="#" class="text-gray-300 hover:text-white transition">Support</a>
                </div>
            </div>
        </div>
    </footer>
</x-app-layout>
