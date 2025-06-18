<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

use App\Models\Leave\leaveApplications;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;
use App\Models\Result\StudentExamResult;
use App\Models\Batch\Shift;
use App\Models\Student\Student_Payment;

class Student extends Model
{     

     protected $table = 'students';
     protected $fillable = [
        'id', 
        'shift_id', 
        'section_id',
        'classe_id',
        'roll_number',
        'admission_date',
        'session',
        'name',       
        'father_name',
        'mother_name',
        'dof',
        'dob_reg',
        'blood_group',
        'gender',
        'religion',
        'photo',
        'mobile_number',
        'email',
        'address',
        
       
    ];
 


    public function classSection()
{
    return $this->belongsTo(Section::class);
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

public function examResults()
{
    return $this->hasMany(StudentExamResult::class,'student_id');
}

public function payments()
{
    return $this->hasMany(Student_Payment::class,'student_id');
}

     
}
