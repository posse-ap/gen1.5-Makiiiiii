<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContentStudylog extends Model
{
    public function contents()
    {
        return $this->hasMany('App\Model\Content');
    }

    public function studylogs()
    {
        return $this->hasMany('App\Model\Studylog');
    }
}
