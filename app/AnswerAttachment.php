<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AnswerAttachment extends Pivot
{
     /**
     * Pole attributu, ktere nejsou zobrazovany pri vypisu.
     */
    protected $hidden = [];
}
