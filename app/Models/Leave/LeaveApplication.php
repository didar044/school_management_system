<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;
use App\Models\Leave\LeaveCategorie;
use App\Models\Student\Student;
use App\Models\Employee\Employee;


class LeaveApplication extends Model
{
     public function leavecategorie()
     {
         return $this->belongsTo(LeaveCategorie::class, 'leave_categorie_id');
    }

     public function student()
     {
        return $this->belongsTo(Student::class,'person_id');
    }
      public function employee()
     {
        return $this->belongsTo(Employee::class,'person_id');
    }
}
