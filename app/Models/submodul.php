<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submodul extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'modul_id',
        'telimci_id'

   ];
    public function modul()
    {
        return $this->hasOne(modul::class, 'id', 'modul_id');
    }

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'telimci_id');
    }
}
