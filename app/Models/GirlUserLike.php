<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GirlUserLike extends Model
{
    use HasFactory;
    protected $table = 'girl_user_likes';
    protected $guarded = false;
}
