<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Answer;
use App\QuestionKind;

class Question extends Model
{
    
    protected $fillable = [
        'question_kind_id', 'author_id', 'title', 'tags', 'description', 'question',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function questionKind()
    {
        return $this->belongsTo(QuestionKind::class);
    }

}
