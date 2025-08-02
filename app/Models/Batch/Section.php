<?php

namespace App\Models\Batch;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
            public function shift()
        {
            return $this->belongsTo(Shift::class, );
        }
}
