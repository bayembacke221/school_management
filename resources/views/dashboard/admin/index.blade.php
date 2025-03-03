<x-app-layout>
    <div class="py-14 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- En-tête du tableau de bord -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Tableau de bord administrateur</h1>
                <p class="text-gray-600">Bienvenue sur votre espace de gestion scolaire</p>
            </div>

            <!-- Cartes statistiques avec animation au survol -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Carte Total Étudiants -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-4 shadow-md">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate mb-1">
                                        Total Étudiants
                                    </dt>
                                    <dd class="text-3xl font-bold text-gray-900">
                                        {{ $totalStudents ?? 0 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <div class="text-sm text-indigo-600">
                                <a href="#" class="flex items-center font-medium hover:underline">
                                    <span>Voir tous les étudiants</span>
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Total Enseignants -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-4 shadow-md">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate mb-1">
                                        Total Enseignants
                                    </dt>
                                    <dd class="text-3xl font-bold text-gray-900">
                                        {{ $totalTeachers ?? 0 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <div class="text-sm text-green-600">
                                <a href="#" class="flex items-center font-medium hover:underline">
                                    <span>Voir tous les enseignants</span>
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Total Classes -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-4 shadow-md">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate mb-1">
                                        Total Classes
                                    </dt>
                                    <dd class="text-3xl font-bold text-gray-900">
                                        {{ $totalClassrooms ?? 0 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <div class="text-sm text-yellow-600">
                                <a href="#" class="flex items-center font-medium hover:underline">
                                    <span>Voir toutes les classes</span>
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Total Matières -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-red-600 rounded-xl p-4 shadow-md">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate mb-1">
                                        Total Matières
                                    </dt>
                                    <dd class="text-3xl font-bold text-gray-900">
                                        {{ $totalSubjects ?? 0 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <div class="text-sm text-red-600">
                                <a href="#" class="flex items-center font-medium hover:underline">
                                    <span>Voir toutes les matières</span>
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section du tableau de bord principal -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Section graphique (fictive) -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 lg:col-span-2">
                    <div class="flex justify-between items-center p-6 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900">Statistiques annuelles</h2>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm font-medium">Cette année</button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200">Précédente</button>
                        </div>
                    </div>
                    <div class="p-6">
                        <!-- Graphique placeholder -->
                        <div class="w-full h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                            <div class="text-center">
                                <div class="mx-auto w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-gray-700 font-medium">Graphique des performances</h3>
                                <p class="text-gray-500 text-sm mt-1">Visualisez les tendances de l'année scolaire</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section des actions rapides modernisée -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900">Actions rapides</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <a href="#" class="group flex items-center p-4 bg-white border border-gray-200 rounded-xl hover:bg-indigo-50 hover:border-indigo-200 transition-all duration-200">
                                <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-200 transition-all">
                                    <svg class="h-5 w-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-900 font-medium group-hover:text-indigo-700 transition-all">Ajouter un nouvel étudiant</p>
                                    <p class="text-gray-500 text-sm group-hover:text-indigo-500 transition-all">Enregistrer un étudiant dans le système</p>
                                </div>
                            </a>

                            <a href="#" class="group flex items-center p-4 bg-white border border-gray-200 rounded-xl hover:bg-green-50 hover:border-green-200 transition-all duration-200">
                                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center group-hover:bg-green-200 transition-all">
                                    <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-900 font-medium group-hover:text-green-700 transition-all">Ajouter un enseignant</p>
                                    <p class="text-gray-500 text-sm group-hover:text-green-500 transition-all">Enregistrer un nouvel enseignant</p>
                                </div>
                            </a>

                            <a href="#" class="group flex items-center p-4 bg-white border border-gray-200 rounded-xl hover:bg-yellow-50 hover:border-yellow-200 transition-all duration-200">
                                <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center group-hover:bg-yellow-200 transition-all">
                                    <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-900 font-medium group-hover:text-yellow-700 transition-all">Créer une nouvelle classe</p>
                                    <p class="text-gray-500 text-sm group-hover:text-yellow-500 transition-all">Ajouter une classe dans le système</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activités récentes -->
            <div class="mt-6 bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-900">Activités récentes</h2>
                        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Voir toutes les activités</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <!-- Liste des activités récentes -->
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <svg class="h-5 w-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Nouvel étudiant inscrit</h3>
                                <p class="text-gray-500 mt-1">Martin Dupont a été inscrit en classe de 3ème</p>
                                <p class="text-sm text-gray-400 mt-1">Il y a 2 heures</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Mise à jour de l'emploi du temps</h3>
                                <p class="text-gray-500 mt-1">Les cours de mathématiques ont été réorganisés</p>
                                <p class="text-sm text-gray-400 mt-1">Il y a 3 heures</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Nouveau cours ajouté</h3>
                                <p class="text-gray-500 mt-1">Un cours de sciences a été ajouté pour la classe de 4ème</p>
                                <p class="text-sm text-gray-400 mt-1">Il y a 5 heures</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
