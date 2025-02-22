<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('students', 'teachers')->paginate(10);
        return view('admin.classes.index', compact('classrooms'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'academic_year' => 'required|string|max:9',
            'status' => 'required|in:active,inactive',
        ]);

        Classroom::create($validatedData);

        return redirect()->route('admin.classes.index')->with('success', 'Classe créée avec succès.');
    }

    public function show(Classroom $classroom)
    {
        return view('admin.classes.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        return view('admin.classes.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'academic_year' => 'required|string|max:9',
            'status' => 'required|in:active,inactive',
        ]);

        $classroom->update($validatedData);

        return redirect()->route('admin.classes.index')->with('success', 'Classe mise à jour avec succès.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('admin.classes.index')->with('success', 'Classe supprimée avec succès.');
    }
}
