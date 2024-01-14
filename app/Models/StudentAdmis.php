<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdmis extends Model
{
    use HasFactory;

    protected $table = 'studenti_admisi_2024-2025';

    protected $fillable = [
        'sp_id',
        'nume_complet',
        'email',
        'facultate_id',
        'departament_id',
        'medie_bacalaureat',
        'promotie'
    ];

    public function student_profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'sp_id');
    }

    public function facultate():  \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Facultate::class, 'facultate_id');
    }

    public function departament():  \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FacultateDepartamentLicenta::class, 'departament_id');
    }

    public function scopeSearch($query, $value)
    {
        $query->where('nume_complet','like',"%{$value}%")->orWhere('email', 'like', "%{$value}%");
    }
}
