<?php

namespace App\Models\Result;

use Illuminate\Database\Eloquent\Model;
use App\Models\Result\StudentExamMarkDetail;
use App\Models\Exam\StudentExamType;
use App\Models\Student\Student;


class StudentExamResult extends Model
{
     protected $fillable = [
        'student_id',
        'student_exam_type_id',
        'exam_year',
        'total_marks',
        'average_marks',
        'gpa',
        'grade',
        'remark',
    ];

    // public function subjectMarks()
    // {
    //     return $this->hasMany(StudentExamMarkDetail::class);
    // }

    public function student()
    {
         return $this->belongsTo(Student::class); 
    }
    public function examType() 
    { 
        return $this->belongsTo(StudentExamType::class,'student_exam_type_id'); 
    }
    public function markDetails() 
    {
         return $this->hasMany(StudentExamMarkDetail::class,'student_exam_result_id');
    }

   
  
}
