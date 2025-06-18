<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Student\Student_Payment_Detail;
use App\Models\Payment\PaymentMethod;

class Student_Payment extends Model
{
    public function shift(){
        return $this->belongsTo(Shift::class);
    }
    
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
      public function emplyeeadministrator(){
        return $this->belongsTo(EmployeeAdministrator::class,'reiceve_by');
    }

    protected $table = 'student_payments';
    protected $fillable = [
        'student_id',
        'name',
        'reiceve_by',
        'payment_method',
         'payment_date',
        'reference_number',
        'date',
        'total_amount',
        'paid_amount',
        'due_amount',
    ];
public function details()
{
    return $this->hasMany(Student_Payment_Detail::class, 'student_payment_id', 'id');
}
   public function paymentmethod(){
            return $this->belongsTo(PaymentMethod::class,'payment_method');
        }

}
