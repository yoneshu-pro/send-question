<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    protected $fillable = [
        'title',
        'max_slide_page',
        'description',
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
