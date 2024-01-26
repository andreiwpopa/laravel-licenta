<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'facultate_id',
        'departament_id',
        'disciplina_id',
    ];

    public function facultate(): belongsTo
    {
        return $this->belongsTo(Facultate::class);
    }

    public function departament(): belongsTo
    {
        return $this->belongsTo(FacultateDepartamentLicenta::class);
    }

    public function discipline(): belongsToMany
    {
        return $this->belongsToMany(DepartamentDisciplineLicenta::class);
    }
}
