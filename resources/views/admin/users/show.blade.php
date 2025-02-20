<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de l\'utilisateur') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="flex justify-end sm:px-6 lg:px-8">
            <a href="{{ route('admin.users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <svg class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span class="ml-2">Retour</span>
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="h-16 w-16 object-cover rounded-full">
                            <div class="ml-4">
                                <h1 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h1>
                                <p class="text-sm font-medium text-gray-600">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $user->role === 'teacher' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $user->role === 'student' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $user->role === 'parent' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('button');
                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (!confirm('Êtes-vous sûr ?')) {
                            event.preventDefault();
                        }
                    });
                });
            });
        </script>
    </x-slot>


</x-app-layout>
