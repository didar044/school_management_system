<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;
use App\Models\Leave\LeaveCategorie;
use App\Models\Student\Student;
use App\Models\Employee\Employee;
class LeaveTransaction extends Model
{
    protected $fillable = [
    
    'leave_application_id',
    'person_id',
    'leave_categorie_id',
    'date',
    'from_date',
    'to_date',
    'days',
    'remark',
    ];



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
