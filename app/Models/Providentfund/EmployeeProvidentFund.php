<?php

namespace App\Models\Providentfund;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment\EmployeeFestivalBonuse;

class EmployeeProvidentFund extends Model
{
    protected $table = 'employee_provident_funds';
    protected $fillable = [
        'employee_salary_payment_id',
        'employee_id',
        'name',
        'payment_date',
         'provident_fund',
         'employee_festival_bonuse_id'
         
    ];

    public function employeefestivalbonuse(){
                return $this->belongsTo(EmployeeFestivalBonuse::class,'employee_festival_bonuse_id');
            }
}
