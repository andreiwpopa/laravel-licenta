<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentContextScolaritate extends Model
{
    use HasFactory;

    protected $table = 'student_context_scolaritate';

    protected $fillable = [
        'sp_id',
        'facultate_id',
        'departament_id',
        'forma_de_invatamant',
//        'modul',
//        'grupa',
//        'nr_matricol',
//        'tip_loc',
//        'status_curent'
    ];


    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function facultate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Facultate::class, 'facultate_id');
    }

    public function departament(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FacultateDepartamentLicenta::class, 'departament_id');
    }
}
