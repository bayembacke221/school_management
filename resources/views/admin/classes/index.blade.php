<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Classes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <a href="{{ route('admin.classes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span>{{ __('Créer une classe') }}</span>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left table-auto border-collapse">
                            <thead>
                            <tr class="bg-gray-50 text-gray-700 uppercase tracking-wider text-xs">
                                <th class="px-4 py-3">{{ __('Nom') }}</th>
                                <th class="px-4 py-3">{{ __('Section') }}</th>
                                <th class="px-4 py-3">{{ __('Niveau') }}</th>
                                <th class="px-4 py-3">{{ __('Capacité') }}</th>
                                <th class="px-4 py-3">{{ __('Année académique') }}</th>
                                <th class="px-4 py-3">{{ __('Statut') }}</th>
                                <th class="px-4 py-3">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($classrooms as $classroom)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4">{{ $classroom->name }}</td>
                                    <td class="px-4 py-4">{{ $classroom->section }}</td>
                                    <td class="px-4 py-4">{{ $classroom->level }}</td>
                                    <td class="px-4 py-4">{{ $classroom->capacity }}</td>
                                    <td class="px-4 py-4">{{ $classroom->academic_year }}</td>
                                    <td class="px-4 py-4">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $classroom->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($classroom->status) }}
                                            </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.classes.show', $classroom) }}" class="text-blue-500 hover:text-blue-600 font-semibold mr-4">
                                            <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.classes.edit', $classroom) }}" class="text-yellow-500 hover:text-yellow-600 font-semibold mr-4">
                                            <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.classes.destroy', $classroom) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 font-semibold" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette classe ?') }}')">
                                                <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $classrooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
