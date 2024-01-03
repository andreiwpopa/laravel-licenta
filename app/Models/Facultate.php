<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultate extends Model
{
    use HasFactory;

    protected $table = 'facultate';

    protected $fillable = [
        'facultate_name',
    ];

    public function departmente(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FacultateDepartamentLicenta::class);
    }

    public function profesor_discipline(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProfesorDisciplina::class);
    }
}
