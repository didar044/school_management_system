<?php

namespace App\Models\Batch;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     // for relation table
            public function shift()
        {
            return $this->belongsTo(Shift::class);
        }
}
