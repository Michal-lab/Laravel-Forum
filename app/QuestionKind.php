<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionKind extends Model
{
    
    protected $fillable = [
        'code', 'description',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
