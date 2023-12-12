<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorDisciplina extends Model
{
    use HasFactory;

    protected $table = 'profesor_disciplina';

    protected $fillable = [
        'profesor_id',
        'facultate_id',
        'departament_id',
        'disciplina_id',
    ];

    public function profesor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function facultate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Facultate::class, 'facultate_id');
    }

    public function departament(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FacultateDepartamentLicenta::class, 'departament_id');
    }

    public function disciplina(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DepartamentDisciplineLicenta::class, 'disciplina_id');
    }
}
