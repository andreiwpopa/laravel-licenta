<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $table = 'student_profile';

    protected $fillable = [
        'nume_complet',
        'email',
        'data_nastere',
        'tara_nastere',
        'judet_nastere',
        'sex',
    ];

}
