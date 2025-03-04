<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <!-- En-tête de bienvenue -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Bienvenue, {{ $student->first_name }} !</h1>
                    <p class="text-gray-600">{{ $student->classroom->name }} | Matricule: {{ $student->registration_number }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Année scolaire: 2024-2025</p>
                    <p class="text-sm text-gray-600">Semestre: S1</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Prochains cours -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Prochains cours aujourd'hui</h2>

                @if($todaySchedule->count() > 0)
                    @foreach($todaySchedule as $schedule)
                        <div class="border-l-4 border-blue-500 pl-4 mb-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-gray-800">{{ $schedule->subject->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $schedule->teacher->user->full_name }}</p>
                                    <p class="text-sm text-gray-600">Salle: {{ $schedule->room->name }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-4 text-gray-500">
                        <p>Pas de cours programmés pour aujourd'hui.</p>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('student.schedule') }}" class="text-blue-600 hover:text-blue-800 text-sm">Voir tout l'emploi du temps →</a>
                </div>
            </div>

            <!-- Dernières notes -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Dernières notes</h2>

                @if($recentGrades->count() > 0)
                    @foreach($recentGrades as $grade)
                        <div class="border-l-4
                    @if($grade->score >= 16) border-green-500
                    @elseif($grade->score >= 12) border-blue-500
                    @elseif($grade->score >= 10) border-yellow-500
                    @else border-red-500 @endif
                    pl-4 mb-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-gray-800">{{ $grade->course->subject->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $grade->type }}</p>
                                    <p class="text-xs text-gray-500">{{ $grade->grade_date->format('d/m/Y') }}</p>
                                </div>
                                <div>
                            <span class="inline-block
                                @if($grade->score >= 16) bg-green-100 text-green-800
                                @elseif($grade->score >= 12) bg-blue-100 text-blue-800
                                @elseif($grade->score >= 10) bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800 @endif
                                text-xs px-2 py-1 rounded font-medium">
                                {{ $grade->score }} / {{ $grade->max_score }}
                            </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-4 text-gray-500">
                        <p>Pas de notes récentes.</p>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('student.grades') }}" class="text-blue-600 hover:text-blue-800 text-sm">Voir toutes les notes →</a>
                </div>
            </div>

            <!-- Mes cours -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Mes cours</h2>

                @if($courses->count() > 0)
                    <div class="space-y-3">
                        @foreach($courses->take(5) as $course)
                            <a href="{{ route('student.courses.show', $course) }}" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                <h3 class="font-medium text-gray-800">{{ $course->subject->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $course->teacher->user->full_name }}</p>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4 text-gray-500">
                        <p>Aucun cours disponible.</p>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('student.courses') }}" class="text-blue-600 hover:text-blue-800 text-sm">Voir tous les cours →</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
