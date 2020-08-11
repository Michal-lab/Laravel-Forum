<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Pole vlastnosti, ktere nejsou chraneny pred mass assignment utokem.
     */
    protected $fillable = [
        'name',
    ];
}
