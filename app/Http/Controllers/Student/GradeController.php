<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Affiche la liste des notes de l'étudiant
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
        $semester = $request->input('semester', 'all');
        $courseId = $request->input('course_id', 'all');

        // Récupérer les notes avec filtres
        $gradesQuery = $student->grades()->with(['course.subject', 'course.teacher.user']);

        // Filtrer par semestre si spécifié
        if ($semester !== 'all') {
            $gradesQuery->where('semester', $semester);
        }

        // Filtrer par cours si spécifié
        if ($courseId !== 'all') {
            $gradesQuery->where('course_id', $courseId);
        }

        // Récupérer les notes ordonnées par date
        $grades = $gradesQuery->orderBy('grade_date', 'desc')->get();

        // Calcul des statistiques
        $statistics = [
            'average' => $grades->count() > 0 ? $grades->avg('score') : 0,
            'highest' => $grades->count() > 0 ? $grades->max('score') : 0,
            'lowest' => $grades->count() > 0 ? $grades->min('score') : 0,
            'count' => $grades->count(),
        ];

        // Regrouper les notes par matière
        $gradesBySubject = $grades->groupBy(function($grade) {
            return $grade->course->subject->name;
        });

        // Calculer la moyenne par matière
        $averagesBySubject = [];
        foreach ($gradesBySubject as $subject => $subjectGrades) {
            $averagesBySubject[$subject] = $subjectGrades->avg('score');
        }

        // Récupérer la liste des cours pour le filtre
        $courses = collect([]);
        if ($student->classroom) {
            try {
                // Essayer d'utiliser la relation many-to-many
                $courses = $student->classroom->courses()->with('subject')->get();
            } catch (\Exception $e) {
                // Si la table pivot n'existe pas, récupérer tous les cours comme solution temporaire
                $courses = Course::with('subject')->take(10)->get();
            }
        }

        // Liste des semestres pour le filtre
        $semesters = ['S1' => 'Semestre 1', 'S2' => 'Semestre 2'];

        return view('student.grades.index', compact(
            'grades',
            'statistics',
            'gradesBySubject',
            'averagesBySubject',
            'courses',
            'semesters',
            'semester',
            'courseId'
        ));
    }
}
