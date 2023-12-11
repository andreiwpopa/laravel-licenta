<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfileMinister extends Model
{
    use HasFactory;

    protected $table = 'student_profile_minister';


    protected $fillable = [
        'user_id',
        'serie_pasaport',
        'nr_aprob_minister',
        'serie_aprob_minister',
        'data_aprob_minister',
    ];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
