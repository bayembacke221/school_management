<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('student.courses') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour aux cours
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="bg-blue-600 p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold text-white mb-2">{{ $course->subject->name }}</h1>
                        <p class="text-blue-100">{{ $course->name }}</p>
                    </div>
                    <div class="bg-white rounded-lg p-2 text-center">
                        <p class="text-xs text-gray-500">Code du cours</p>
                        <p class="text-lg font-bold text-blue-600">{{ $course->code }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Informations du cours</h2>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Enseignant</p>
                                <p class="font-medium">{{ $course->teacher->user->full_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Matière</p>
                                <p class="font-medium">{{ $course->subject->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Classes</p>
                                <p class="font-medium">
                                    @foreach($course->classrooms as $classroom)
                                        {{ $classroom->name }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </p>
                            </div>
                            @if($course->description)
                                <div>
                                    <p class="text-sm text-gray-500">Description</p>
                                    <p>{{ $course->description }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Emploi du temps</h2>
                        @if($schedules->count() > 0)
                            <div class="space-y-3">
                                @foreach($schedules as $schedule)
                                    <div class="border-l-4 border-blue-500 pl-3 py-1">
                                        <p class="font-medium">{{ $schedule->day_name }}</p>
                                        <p class="text-sm text-gray-600">{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}</p>
                                        <p class="text-sm text-gray-600">{{ $schedule->room->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic">Aucun horaire programmé pour ce cours.</p>
                        @endif
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Mes notes dans ce cours</h2>
                        @if($grades->count() > 0)
                            <div class="space-y-3">
                                @foreach($grades as $grade)
                                    <div class="border-l-4
                                @if($grade->score >= 16) border-green-500
                                @elseif($grade->score >= 12) border-blue-500
                                @elseif($grade->score >= 10) border-yellow-500
                                @else border-red-500 @endif
                                pl-3 py-1">
                                        <div class="flex justify-between">
                                            <div>
                                                <p class="font-medium">{{ $grade->type }}</p>
                                                <p class="text-sm text-gray-500">{{ $grade->grade_date->format('d/m/Y') }}</p>
                                            </div>
                                            <div>
                                        <span class="inline-block
                                            @if($grade->score >= 16) bg-green-100 text-green-800
                                            @elseif($grade->score >= 12) bg-blue-100 text-blue-800
                                            @elseif($grade->score >= 10) bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800 @endif
                                            text-xs px-2 py-1 rounded font-medium">
                                            {{ $grade->score }}/{{ $grade->max_score }}
                                        </span>
                                            </div>
                                        </div>
                                        @if($grade->comment)
                                            <p class="text-sm text-gray-700 mt-1">{{ $grade->comment }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic">Aucune note pour ce cours.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
