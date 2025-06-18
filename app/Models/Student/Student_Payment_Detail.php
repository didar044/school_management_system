<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Student_Payment_Detail extends Model
{     
    protected $table = 'student_payment_details';
    protected $fillable = [
        'student_payment_id',
        'expense_type',
        'fee',
        'month',
        'waived',
        'total',
        'remark',
    ];
}
