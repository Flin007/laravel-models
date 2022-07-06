<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Girl extends Model
{
    use HasFactory;
    protected $table = 'girls';
    protected $guarded = false;

    public static function getPhotosArray(Girl $girl){
        return $girl->photos_json ? json_decode($girl->photos_json) : false;
    }
}
