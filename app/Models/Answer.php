<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $casts = [
        'teqdim_edilen_cavablar'=>'array',
        'cavablarin_neticesi'=>'array',
    ];

    protected $fillable = [
        'student_id',
        'teacher_id',
        'telim_id',
        'modul_id',
        'teqdim_edilen_cavablar',
        'cavablarin_neticesi',
        'status_time',
        'suallarin_yuklenme_tarixi'



    ];

    public function teacher()
    {
        return $this->hasOne(user::class, 'id', 'teacher_id');
    }

    public function student()
    {
        return $this->hasOne(user::class, 'id', 'student_id');
    }

    public function telim()
    {
        return $this->hasOne(telimler::class, 'id', 'telim_id');
    }

    public function modul()
    {
        return $this->hasOne(modul::class, 'id', 'modul_id');
    }

    public function submodul()
    {
        return $this->hasOne(submodul::class, 'id', 'submodul_id');
    }
}
