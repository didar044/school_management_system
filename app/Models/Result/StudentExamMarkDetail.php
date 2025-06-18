<?php

namespace App\Models\Result;

use Illuminate\Database\Eloquent\Model;
use App\Models\Result\StudentExamResult;
use App\Models\Schedule\Subject;

class StudentExamMarkDetail extends Model
{
        protected $fillable = [
        'student_exam_result_id',
        'student_exam_type_id',
        'subject_id',
        'written_marks',
        'mcq_marks',
        'w_m_marks',
        'gpa',
        'grade',
        'remark',
    ];

    public function examResult()
    {
        return $this->belongsTo(StudentExamResult::class);
    }
     public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
