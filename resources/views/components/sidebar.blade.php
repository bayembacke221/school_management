<div class="h-full bg-white border-r border-gray-100 shadow-sm overflow-y-auto transition-all duration-300 ease-in-out"
     :class="sidebarOpen ? 'w-72' : 'w-20'">
    <div class="py-5 px-4 flex flex-col h-full">
        <!-- Bouton toggle sidebar -->
        <button @click="sidebarOpen = !sidebarOpen"
                class="self-end mb-4 text-gray-500 hover:text-indigo-600 focus:outline-none transition-colors duration-200">
            <svg x-show="sidebarOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
            <svg x-show="!sidebarOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Info utilisateur -->
        <div class="flex items-center mb-6" :class="sidebarOpen ? 'justify-start' : 'justify-center'">
            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-semibold">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div x-show="sidebarOpen" class="ml-3">
                <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500">{{ auth()->user()->role }}</p>
            </div>
        </div>

        <!-- Navigation principale -->
        <nav class="space-y-2 flex-1">

            <!-- Autres éléments de navigation spécifiques au rôle -->
            @switch(auth()->user()->role)
                @case('admin')
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-3 py-2 rounded-lg transition-colors duration-200"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'"
                       :class="{'bg-gradient-to-r from-blue-600 to-indigo-700 text-white': window.location.pathname.endsWith('/dashboard'),
                        'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600': !window.location.pathname.endsWith('/dashboard')}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             :class="{'text-white': window.location.pathname.endsWith('/dashboard'),
                           'text-indigo-600 group-hover:text-indigo-600': !window.location.pathname.endsWith('/dashboard')}">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Utilisateurs</span>
                    </a>

                    <a href="{{ route('admin.school-management') }}" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Établissements</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Rapports</span>
                    </a>
                    @break

                @case('teacher')
                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Cours</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Devoirs</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Notes</span>
                    </a>
                    @break

                @case('student')
                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Mes cours</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Devoirs</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Mes notes</span>
                    </a>
                    @break

                @case('parent')
                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Mes enfants</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Suivi des notes</span>
                    </a>

                    <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                        <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span x-show="sidebarOpen" class="ml-3">Événements</span>
                    </a>
                    @break
            @endswitch
        </nav>

        <!-- Liens du bas de la sidebar -->
        <div class="mt-6 pt-6 border-t border-gray-100">
            <a href="#" class="group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
               :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                <svg class="h-6 w-6 text-indigo-600 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3">Paramètres</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full group flex items-center px-3 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-red-50 hover:text-red-600 mt-2"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                    <svg class="h-6 w-6 text-red-500 group-hover:text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Déconnexion</span>
                </button>
            </form>
        </div>

        <!-- Version minimisée - Informations système -->
        <div class="mt-4 pt-4 border-t border-gray-100" x-show="sidebarOpen">
            <div class="px-3 text-xs text-gray-500">
                <p>SchoolManager v1.2.0</p>
                <p class="mt-1">© {{ date('Y') }} Tous droits réservés</p>
            </div>
        </div>
    </div>
</div>
