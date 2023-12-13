<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformatiiScolaritate extends Model
{
    use HasFactory;

    protected $table = 'student_informatii_scolaritate';

    protected $fillable = [
        'user_id',
        'categorie_studii',
        'an_absolvire_liceu',
        'medie_bacalaureat',
        'proveninta',
        'medie_admitere',
        'sesiune_admitere',
        'promotie',
    ];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
