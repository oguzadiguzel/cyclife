<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Note extends Model
{
    //protected $appends = array('summary');

    public function getSummaryAttribute()
    {
        return Str::limit($this->content, 250);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
