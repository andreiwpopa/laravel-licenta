<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfileMinister extends Model
{
    use HasFactory;

    protected $table = 'student_profile_minister';


    protected $fillable = [
        'sp_id',
        'serie_pasaport',
        'nr_aprob_minister',
        'serie_aprob_minister',
        'data_aprob_minister',
    ];

    public function student_profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'sp_id');
    }
}
