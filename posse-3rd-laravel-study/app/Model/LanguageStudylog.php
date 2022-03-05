<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LanguageStudylog extends Model
{
    public function languages()
    {
        return $this->hasMany('App\Model\Language');
    }

    public function studylogs()
    {
        return $this->hasMany('App\Model\Studylog');
    }
}
