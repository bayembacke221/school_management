<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Cette classe représente un élève.
 * Il peut être associé à une seule classe.
 * Il permet de gérer les informations des élèves.
 **/
class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'registration_number',
        'birth_date',
        'gender',
        'email',
        'phone_number',
        'address',
        'classroom_id',
        'status'
    ];

    // Relations
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    // Accesseur pour le nom complet
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
