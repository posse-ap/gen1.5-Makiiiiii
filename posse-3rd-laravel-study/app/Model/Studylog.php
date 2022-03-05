<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Studylog extends Model
{
    // public function contents()
    // {
    //     return $this->hasOne('App\Model\Content');
    // }

    // public function languages()
    // {
    //     return $this->hasOne('App\Model\Language');
    // }

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'user_id',
        'date',
        'content_id',
        'language_id',
        'study_time',
        'comment',
    ];
}
