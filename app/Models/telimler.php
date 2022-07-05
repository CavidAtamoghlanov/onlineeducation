<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telimler extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'submodul_id',
        'telimci_id',
        'desc',
        'short_desc',
        'picture',
        'material',
        'imtahan_suallari',
        'video_link'

   ];
    public function submodul()
    {
        return $this->hasOne(submodul::class, 'id', 'submodul_id');
    }

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'telimci_id');
    }
   
    public function getPictureAttribute($value)
    {
        if($value)
        {
            return asset('user/materials/'.$value);
        }
        else{
            return asset('user/materials/no-image.png');
        }
    }



}
