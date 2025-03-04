<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mon emploi du temps</h1>
        </div>

        <!-- Filtres -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form action="{{ route('student.schedule') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="day" class="block text-sm font-medium text-gray-700 mb-1">Jour</label>
                    <select id="day" name="day" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <option value="">Tous les jours</option>
                        @foreach($days as $key => $name)
                            <option value="{{ $key }}" {{ $selectedDay == $key ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semestre</label>
                    <select id="semester" name="semester" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        @foreach($semesters as $key => $name)
                            <option value="{{ $key }}" {{ $semester == $key ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        Filtrer
                    </button>
                    <a href="{{ route('student.schedule') }}" class="ml-2 text-gray-600 hover:text-gray-800 font-medium py-2 px-4">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Total des heures</p>
                <p class="text-2xl font-bold text-blue-600">{{ $statistics['total_hours'] }}h</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Matières</p>
                <p class="text-2xl font-bold text-green-600">{{ $statistics['subjects_count'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Salles</p>
                <p class="text-2xl font-bold text-yellow-600">{{ $statistics['rooms_count'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Jours</p>
                <p class="text-2xl font-bold text-purple-600">{{ $statistics['days_count'] }}</p>
            </div>
        </div>

        <!-- Emploi du temps -->
        @if(count($schedulesByDay) > 0)
            @foreach($schedulesByDay as $day => $daySchedules)
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-4 bg-gray-50 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $days[$day] }}</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach($daySchedules as $schedule)
                                <div class="flex border-l-4 border-blue-500 pl-4 py-2">
                                    <div class="w-24 flex-shrink-0 mr-4">
                                        <p class="text-sm font-medium text-gray-900">{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}</p>
                                        <p class="text-xs text-gray-500">{{ $schedule->duration }}</p>
                                    </div>
                                    <div class="flex-grow">
                                        <h3 class="text-base font-medium text-gray-900">{{ $schedule->subject->name }}</h3>
                                        <p class="text-sm text-gray-600">{{ $schedule->teacher->user->full_name }}</p>
                                        <div class="flex items-center mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span class="text-xs text-gray-500">{{ $schedule->room->name }}</span>
                                        </div>
                                    </div>
                                    <div class="w-24 flex-shrink-0 text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $schedule->semester }}
                            </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun cours programmé</h3>
                <p class="text-gray-500">Aucun cours n'a été trouvé pour les critères sélectionnés.</p>
            </div>
        @endif
    </div>
</x-app-layout>
