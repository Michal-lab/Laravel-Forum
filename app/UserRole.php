<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    /**
     * Pole attributu, ktere nejsou zobrazovany pri vypisu.
     */
    protected $hidden = [];
}
