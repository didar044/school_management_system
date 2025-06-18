<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryPaymentDetail extends Model
{
     protected $table = 'employee_salary_payment_details';
    protected $fillable = [
        'employee_salary_payment_id',
        'basic_salary',
        'house_allowance',
        'transport_allowance',
        'medical_allowance',
        'education_allowance',
        'food_allowance',
        'child_care_allowance',
        'bonus',
        'provident_fund',
        'absence',
        'fine',
        'tax'
    ];
}
