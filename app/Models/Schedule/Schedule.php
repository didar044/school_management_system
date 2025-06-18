<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Model;

use App\Models\Batch\Section;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Schedule\Period;
use App\Models\Schedule\Subject;
use App\Models\Employee\Employee;
use App\Models\Schedule\Room;
class Schedule extends Model
{
     public function shift(){
        return $this->belongsTo(Shift::class);
    }
    
     public function section(){
        return $this->belongsTo(Section::class);
    }
     public function classe(){
        return $this->belongsTo(Classe::class);
    }
     public function period(){
        return $this->belongsTo(Period::class);
    }
     public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    
       public function room(){
        return $this->belongsTo(Room::class);
    }


}
