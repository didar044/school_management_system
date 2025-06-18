<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Shift;
use App\Models\Batch\Section;
use App\Models\Batch\Classe;

class Application extends Model
{
    //for relation table

    public function shift(){
        return $this->belongsTo(Shift::class);

    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
