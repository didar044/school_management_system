<?php

namespace App\Models\Exam;

use Illuminate\Database\Eloquent\Model;
use App\Models\Exam\StudentExamType;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;
use App\Models\Batch\Shift;
use App\Models\Schedule\Room;
use App\Models\Schedule\Subject;

class StudentExamSchedule extends Model
{
    public function shift(){
    return $this->belongsTo(Shift::class);

    }
     public function studentexamtype(){
    return $this->belongsTo(StudentExamType::class,'student_exam_type_id');

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
}
