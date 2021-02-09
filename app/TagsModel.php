<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    protected $table = 'tags';

    public function posts()
    {
        return $this->belongsToMany("App\PostModel","post_tag","tag_id","post_id");
    }
}

