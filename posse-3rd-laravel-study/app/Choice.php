<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public function questions()
    {
        return $this->belongsTo('App\Question');
    }

    protected $fillable = [
        'question_id',
        'name',
        'choice_id',
    ];
}
