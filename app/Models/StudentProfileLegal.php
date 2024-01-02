<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfileLegal extends Model
{
    use HasFactory;

    protected $table = 'student_profile_legal';


    protected $fillable = [
        'sp_id',
        'mediu',
        'strain',
        'minoritar',
        'cetatenie',
        'nationalitate',
        'cnp',
        'serie',
        'stare_civila',
        'situatie_militara',
        'nr_livret_militar',
    ];

    public function student_profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'sp_id');
    }
}
