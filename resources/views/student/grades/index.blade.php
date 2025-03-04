<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mes notes</h1>
        </div>

        <!-- Filtres -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form action="{{ route('student.grades') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semestre</label>
                    <select id="semester" name="semester" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <option value="all" {{ $semester == 'all' ? 'selected' : '' }}>Tous les semestres</option>
                        @foreach($semesters as $key => $name)
                            <option value="{{ $key }}" {{ $semester == $key ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="course_id" class="block text-sm font-medium text-gray-700 mb-1">Matière</label>
                    <select id="course_id" name="course_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <option value="all" {{ $courseId == 'all' ? 'selected' : '' }}>Toutes les matières</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $courseId == $course->id ? 'selected' : '' }}>{{ $course->subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        Filtrer
                    </button>
                    <a href="{{ route('student.grades') }}" class="ml-2 text-gray-600 hover:text-gray-800 font-medium py-2 px-4">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Moyenne générale</p>
                <p class="text-2xl font-bold {{ $statistics['average'] >= 10 ? 'text-green-600' : 'text-red-600' }}">
                    {{ number_format($statistics['average'], 2) }}/20
                </p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Note la plus haute</p>
                <p class="text-2xl font-bold text-green-600">{{ number_format($statistics['highest'], 2) }}/20</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Note la plus basse</p>
                <p class="text-2xl font-bold {{ $statistics['lowest'] >= 10 ? 'text-green-600' : 'text-red-600' }}">
                    {{ number_format($statistics['lowest'], 2) }}/20
                </p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <p class="text-sm text-gray-500 mb-1">Total des évaluations</p>
                <p class="text-2xl font-bold text-blue-600">{{ $statistics['count'] }}</p>
            </div>
        </div>

        <!-- Graphique des moyennes par matière -->
        @if(count($averagesBySubject) > 0)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Moyennes par matière</h2>
                <div class="space-y-3">
                    @foreach($averagesBySubject as $subject => $average)
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm font-medium text-gray-700">{{ $subject }}</span>
                                <span class="text-sm font-medium {{ $average >= 10 ? 'text-green-600' : 'text-red-600' }}">
                        {{ number_format($average, 2) }}/20
                    </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="h-2.5 rounded-full
                        @if($average >= 16) bg-green-600
                        @elseif($average >= 12) bg-blue-600
                        @elseif($average >= 10) bg-yellow-600
                        @else bg-red-600 @endif"
                                     style="width: {{ min(100, ($average/20)*100) }}%">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Liste des notes -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-gray-50 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Liste des notes</h2>
            </div>

            @if($grades->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matière</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enseignant</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($grades as $grade)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $grade->grade_date->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $grade->course->subject->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $grade->course->teacher->user->full_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $grade->type }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $grade->semester }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($grade->score >= 16) bg-green-100 text-green-800
                                @elseif($grade->score >= 12) bg-blue-100 text-blue-800
                                @elseif($grade->score >= 10) bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ $grade->score }}/{{ $grade->max_score }}
                            </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-6 text-center text-gray-500">
                    <p>Aucune note trouvée avec les filtres sélectionnés.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
