<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee\Employee_categorie;
class EmployeeDeduction extends Model
{
     public function employee_categorie(){
        return $this->belongsTo(Employee_categorie::class);
    }
}
