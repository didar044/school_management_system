<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;
use App\Models\Student\Student;
use App\Models\Batch\Shift;

class StudentAttendance extends Model
{


    protected $fillable = [
        'date',
        'student_id',
        'class_id',
        'section_id',
        'shift_id',
        'in_time',
        'out_time',
        'status',
        'remark',
    ];

       public function student()
        {
            return $this->belongsTo(Student::class,'student_id');
        }
        public function class()
        {
            return $this->belongsTo(Classe::class,'classe_id');
        }
         public function shift()
        {
         return $this->belongsTo(Shift::class,'shift_id');
        }
        public function section()
        {
            return $this->belongsTo(Section::class,'section_id');
        }
}
