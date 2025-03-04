<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mes cours</h1>
        </div>

        @if($courses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    <a href="{{ route('student.courses.show', $course) }}" class="block">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden h-full hover:shadow-lg transition-shadow duration-200">
                            <div class="h-3 bg-blue-600"></div>
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->subject->name }}</h2>
                                <p class="text-gray-600 text-sm mb-4">{{ $course->name }}</p>

                                <div class="flex items-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <p class="text-gray-700">{{ $course->teacher->user->full_name }}</p>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-gray-700">{{ $course->classrooms->count() }} classe(s)</p>
                                </div>

                                @if($course->description)
                                    <div class="mt-4 pt-4 border-t border-gray-100">
                                        <p class="text-gray-600 text-sm line-clamp-2">{{ $course->description }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="px-6 py-3 bg-gray-50 flex justify-between items-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $course->code }}
                    </span>
                                <span class="text-blue-600 text-sm font-medium">Voir détails →</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun cours disponible</h3>
                <p class="text-gray-500">Vous n'êtes inscrit à aucun cours pour le moment.</p>
            </div>
        @endif
    </div>
</x-app-layout>
