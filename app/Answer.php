<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{     
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
