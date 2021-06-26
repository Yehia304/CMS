<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['post_image','post_thumbnail','post_content'];

    public function topics(){
        return $this->hasMany('App\Models\Topic');
    }
}
