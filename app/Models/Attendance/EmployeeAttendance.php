<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee\Employee;
use App\Models\Employee\Employeeshift;

class EmployeeAttendance extends Model
{
      public function employee()
        {
            return $this->belongsTo(Employee::class);
        }
        public function employeeshift(){

           return $this->belongsTo(Employeeshift::class);
       }
}
