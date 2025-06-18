<?php

namespace App\Models\Fee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Payment\PaymentMethod;


class Feecollection extends Model
{
       public function shift(){
        return $this->belongsTo(Shift::class);
    }
    
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
   
       public function payment(){
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
       public function paymentmethod(){
            return $this->belongsTo(PaymentMethod::class,'payment_method');
        }
}
