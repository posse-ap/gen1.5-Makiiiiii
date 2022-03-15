<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    protected $fillable = [
        'area_id',
        'image_path',
        'list',
    ];
}
