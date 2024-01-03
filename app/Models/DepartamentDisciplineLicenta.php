<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentDisciplineLicenta extends Model
{
    use HasFactory;

    protected $table = 'departament_discipline_licenta';

    protected $fillable = [
        'departament_id',
        'disciplina_name',
        'disciplina_credit',
        'an',
        'semestru',
    ];

    public function departament(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FacultateDepartamentLicenta::class, 'departament_id');
    }
}
