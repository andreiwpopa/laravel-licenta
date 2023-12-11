<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultateDepartamentLicenta extends Model
{
    use HasFactory;

    protected $table = 'facultate_departament_licenta';

    protected $fillable = [
        'facultate_id',
        'departament_name',
    ];

    public function facultate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Facultate::class, 'facultate_id');
    }

    public function discipline(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DepartamentDisciplineLicenta::class);
    }

    public function profesor_discipline(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProfesorDisciplina::class);
    }
}
