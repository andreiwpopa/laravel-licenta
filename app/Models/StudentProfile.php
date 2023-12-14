<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function student_profile(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function student_profile_legal(): HasOne
    {
        return $this->hasOne(StudentProfileLegal::class);
    }

    public function student_profile_minister(): HasOne
    {
        return $this->hasOne(StudentProfileMinister::class);
    }
}
