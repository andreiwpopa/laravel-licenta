<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformatiiScolaritate extends Model
{
    use HasFactory;

    protected $table = 'student_informatii_scolaritate';

    protected $fillable = [
        'sp_id',
        'categorie_studii',
        'an_absolvire_liceu',
        'medie_bacalaureat',
        'olimpic',
        'medie_admitere',
        'promotie',
    ];

    public function student_profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'sp_id');
    }
}
