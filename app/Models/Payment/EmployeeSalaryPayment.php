<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Payment\EmployeeFestivalBonuse;
use App\Models\Payment\PaymentMethod;
use App\Models\Employee\Employee;

class EmployeeSalaryPayment extends Model
{
 
    protected $table = 'employee_salary_payments';
    protected $fillable = [
        'employee_id',
        'name',
        'payment_date',
        'employee_administrator_id',
        'employee_festival_bonuse_id',
        'payment_method_id',
        'reference',
        'total_amount',
        'total_deductions',
        'net_salary',
        'paid_amount'

    ];


        public function employeeadministrator(){
                return $this->belongsTo(EmployeeAdministrator::class,'employee_administrator_id');
            }
       public function employeefestivalbonuse(){
                return $this->belongsTo(EmployeeFestivalBonuse::class,'employee_festival_bonuse_id');
            }
       public function paymentmethod(){
            return $this->belongsTo(PaymentMethod::class,'payment_method_id');
        }

      public function employee()
        {
            return $this->belongsTo(Employee::class);
        }
}
