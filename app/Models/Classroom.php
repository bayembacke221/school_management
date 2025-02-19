<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Cette classe représente une classe.
 * Elle peut contenir plusieurs élèves et plusieurs enseignants.
 * Elle permet de gérer les informations des classes.
 **/
class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section',
        'level',
        'capacity',
        'academic_year',
        'status'
    ];

    // Relations
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classroom_teacher');
    }
}
