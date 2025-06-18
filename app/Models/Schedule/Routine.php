<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Section;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Schedule\Subject;
use App\Models\Schedule\Room;
use App\Models\Employee\Employee;

class Routine extends Model
{
    protected $table = 'fic_schedules';

    public function shift(){
        return $this->belongsTo(Shift::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

     public function room(){
        return $this->belongsTo(Room::class);
    }
}
