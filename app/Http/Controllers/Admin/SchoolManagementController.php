<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Room;
use App\Models\Subject;
use App\Models\Schedule;

class SchoolManagementController extends Controller
{
    /**
     * Affiche la vue principale de gestion de l'établissement.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupération des statistiques pour la vue
        $data = [
            'classesCount' => ClassRoom::count(),
            'roomsCount' => Room::count(),
            'subjectsCount' => Subject::count(),
            'schedulesCount' => Schedule::count(),
        ];

        return view('admin.school-management.index', $data);
    }
}
