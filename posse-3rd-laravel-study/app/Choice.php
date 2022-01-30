<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'question_id',
        'name',
        'choice_id',
    ];
}
