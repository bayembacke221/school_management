<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Affiche la liste des cours de l'étudiant
     * (utilisé également comme tableau de bord étudiant)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer l'étudiant connecté avec sa relation utilisateur
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        // Vérifier si l'étudiant existe
        if (!$student) {
            return redirect()->route('login')
                ->with('error', 'Profil étudiant non trouvé. Veuillez contacter l\'administration.');
        }

        // Charger la relation classroom
        $student->load('classroom');

        // Récupérer les cours liés à la classe de l'étudiant
        $courses = collect([]);
        if ($student->classroom_id) {
            try {
                // Essayer de récupérer les cours avec la relation many-to-many
                $courses = Course::whereHas('classrooms', function($query) use ($student) {
                    $query->where('classrooms.id', $student->classroom_id);
                })
                    ->with(['teacher.user', 'subject'])
                    ->get();
            } catch (\Exception $e) {
                // Si la table pivot n'existe pas, récupérer tous les cours comme solution temporaire
                $courses = Course::with(['teacher.user', 'subject'])
                    ->take(10) // Limiter à 10 cours pour éviter de charger trop de données
                    ->get();
            }
        }

        // Récupérer les dernières notes
        $recentGrades = $student->grades()->with('course')->latest()->take(5)->get();

        // Récupérer les prochains cours du jour, seulement si l'étudiant a une classe
        $todaySchedule = collect([]);
        if ($student->classroom) {
            $today = now()->format('l');
            $todaySchedule = $student->classroom->schedules()
                ->where('day', strtolower($today))
                ->where('start_time', '>=', now()->format('H:i:s'))
                ->with(['subject', 'teacher.user', 'room'])
                ->orderBy('start_time')
                ->take(3)
                ->get();
        }

        return view('student.dashboard', compact('courses', 'recentGrades', 'todaySchedule', 'student'));
    }

    /**
     * Affiche les détails d'un cours spécifique
     *
     * @param Course $course
     * @return \Illuminate\View\View
     */
    public function show(Course $course)
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

        // Vérifier que l'étudiant a une classe assignée
        if (!$student->classroom_id) {
            return redirect()->route('student.courses')
                ->with('error', 'Vous n\'êtes pas assigné à une classe.');
        }

        // Vérifier si le cours appartient à la classe de l'étudiant
        $hasAccess = $course->classrooms()->where('classrooms.id', $student->classroom_id)->exists();

        if (!$hasAccess) {
            return redirect()->route('student.courses')
                ->with('error', 'Vous n\'avez pas accès à ce cours.');
        }

        // Charger les relations nécessaires
        $course->load(['teacher.user', 'subject', 'classrooms']);

        // Récupérer les notes de l'étudiant pour ce cours
        $grades = $student->grades()
            ->where('course_id', $course->id)
            ->orderBy('grade_date', 'desc')
            ->get();

        // Récupérer l'emploi du temps pour ce cours
        $schedules = $student->classroom->schedules()
            ->where('subject_id', $course->subject_id)
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('student.courses.show', compact('course', 'grades', 'schedules', 'student'));
    }
}
