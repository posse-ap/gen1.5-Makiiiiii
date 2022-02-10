<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Studylog extends Model
{
    public function contents()
    {
        return $this->hasOne('App\Model\Content');
    }

    public function languages()
    {
        return $this->hasOne('App\Model\Language');
    }
}
