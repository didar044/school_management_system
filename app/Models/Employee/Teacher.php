<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee\Employee;
use App\Models\Employee\Employeeshift;
use App\Models\Employee\Employee_categorie;
use App\Models\Payment\EmployeeSalarie;
use App\Models\Payment\EmployeeDeduction;


class Teacher extends Model
{
    public function employee()
        {
            return $this->belongsTo(Employee::class, 'employee_id');
        }

    public function employeeshift(){
        return $this->belongsTo(Employeeshift::class);
    }
    public function employee_categorie(){
        return $this->belongsTo(Employee_categorie::class ,'employee_categorie_id');
    }

    //i use it for make employee payment invoice  
     public function employeesalarie(){
        return $this->hasOne(EmployeeSalarie::class, 'employee_categorie_id', 'employee_categorie_id');
    }
     public function employeededuction(){
        return $this->hasOne(EmployeeDeduction::class, 'employee_categorie_id', 'employee_categorie_id');
    }
}
