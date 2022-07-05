<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modul extends Model
{
    use HasFactory;
    protected $fillable = [
         'name',
         'telimci_id'

    ];

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'telimci_id');
    }
}
