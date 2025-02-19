<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Cette classe représente une salle.
 * Elle peut contenir plusieurs cours et plusieurs emplois du temps.
 * Elle permet de gérer les informations des salles.
 **/
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name',
        'capacity',
        'type',
        'description',
        'status'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}

