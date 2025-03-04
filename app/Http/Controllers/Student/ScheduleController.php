<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Affiche l'emploi du temps de l'étudiant
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Récupérer l'étudiant connecté
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        // Vérifier si l'étudiant existe
        if (!$student) {
            return redirect()->route('login')
                ->with('error', 'Profil étudiant non trouvé. Veuillez contacter l\'administration.');
        }

        // Charger la relation classroom
        $student->load('classroom');

        // Paramètres de filtrage
        $selectedDay = $request->input('day', null);
        $semester = $request->input('semester', 'S1');

        // Vérifier si l'étudiant est assigné à une classe
        if (!$student->classroom) {
            // Si l'étudiant n'a pas de classe, initialiser des collections vides
            $schedules = collect([]);
            $schedulesByDay = collect([]);
            $statistics = [
                'total_hours' => 0,
                'subjects_count' => 0,
                'rooms_count' => 0,
                'days_count' => 0,
            ];

            // Liste des jours pour l'affichage et le filtrage
            $days = [
                'monday' => 'Lundi',
                'tuesday' => 'Mardi',
                'wednesday' => 'Mercredi',
                'thursday' => 'Jeudi',
                'friday' => 'Vendredi',
                'saturday' => 'Samedi'
            ];

            // Liste des semestres pour le filtrage
            $semesters = ['S1' => 'Semestre 1', 'S2' => 'Semestre 2'];

            return view('student.schedule.index', compact(
                'schedulesByDay',
                'days',
                'selectedDay',
                'semester',
                'semesters',
                'statistics',
                'student'
            ))->with('error', 'Vous n\'êtes pas assigné à une classe.');
        }

        // Récupérer l'emploi du temps de la classe de l'étudiant
        $schedulesQuery = $student->classroom->schedules()
            ->with(['subject', 'teacher.user', 'room'])
            ->active()
            ->where('semester', $semester);

        // Filtrer par jour si spécifié
        if ($selectedDay) {
            $schedulesQuery->where('day', $selectedDay);
        }

        // Récupérer l'emploi du temps ordonné
        $schedules = $schedulesQuery->orderBy('day')
            ->orderBy('start_time')
            ->get();

        // Regrouper les emplois du temps par jour
        $schedulesByDay = $schedules->groupBy('day');

        // Liste des jours pour l'affichage et le filtrage
        $days = [
            'monday' => 'Lundi',
            'tuesday' => 'Mardi',
            'wednesday' => 'Mercredi',
            'thursday' => 'Jeudi',
            'friday' => 'Vendredi',
            'saturday' => 'Samedi'
        ];

        // Liste des semestres pour le filtrage
        $semesters = ['S1' => 'Semestre 1', 'S2' => 'Semestre 2'];

        // Calculer les statistiques de l'emploi du temps
        $statistics = [
            'total_hours' => $schedules->sum(function($schedule) {
                return now()->createFromTimeString($schedule->start_time)
                    ->diffInHours(now()->createFromTimeString($schedule->end_time));
            }),
            'subjects_count' => $schedules->pluck('subject_id')->unique()->count(),
            'rooms_count' => $schedules->pluck('room_id')->unique()->count(),
            'days_count' => $schedules->pluck('day')->unique()->count(),
        ];

        return view('student.schedule.index', compact(
            'schedulesByDay',
            'days',
            'selectedDay',
            'semester',
            'semesters',
            'statistics',
            'student'
        ));
    }
}
