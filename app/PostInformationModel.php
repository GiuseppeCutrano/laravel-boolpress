<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInformationModel extends Model
{
    protected $table = 'posts_information';
    protected $fillable = ["post_id","description","slug"];

    public function post(){
        return $this->belongsTo('App\PostModel');
    }
}
