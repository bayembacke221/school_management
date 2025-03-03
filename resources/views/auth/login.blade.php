<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Formes décoratives -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -left-10 top-20 w-40 h-40 rounded-full bg-indigo-500 opacity-5 animate-pulse"></div>
            <div class="absolute right-20 top-40 w-60 h-60 rounded-full bg-blue-300 opacity-5 animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute left-1/3 bottom-20 w-20 h-20 rounded-full bg-purple-300 opacity-5 animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <div>
                <!-- Logo ou icône (facultatif) -->
                <div class="mx-auto h-16 w-16 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-full flex items-center justify-center shadow-lg mb-6">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path>
                    </svg>
                </div>

                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Connexion à votre compte
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Entrez vos identifiants pour accéder à la plateforme
                </p>
            </div>

            <div class="bg-white py-8 px-6 shadow-2xl rounded-2xl border border-gray-100">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <x-input
                                    type="email"
                                    name="email"
                                    id="email"
                                    required
                                    class="pl-10 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-lg border-gray-300 shadow-sm"
                                    placeholder="vous@exemple.com"
                                />
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <x-input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    class="pl-10 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-lg border-gray-300 shadow-sm"
                                    placeholder="••••••••"
                                />
                            </div>
                        </div>
                    </div>

                    @error('email')
                    <div class="text-red-500 text-sm bg-red-50 p-2 rounded-lg border border-red-200 flex items-start">
                        <svg class="h-5 w-5 text-red-400 mr-1.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                Se souvenir de moi
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transform transition-all duration-200 hover:translate-y-[-2px]">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-indigo-300 group-hover:text-indigo-200 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Lien pour retourner à l'accueil -->
            <div class="text-center mt-4">
                <a href="/" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors flex items-center justify-center">
                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
