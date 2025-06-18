<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Classe;

class Expense extends Model
{
    
    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }

    public function totalExpectedFee() {
    return
        ($this->admission_fee ?? 0) +
        (($this->monthly_fee ?? 0) * 12) +
        ($this->uniform_fee ?? 0) +
        ($this->books_fee ?? 0) +
        (($this->exam_fee ?? 0) * 3) +
        (($this->library_fee ?? 0) * 12) +
        (($this->lab_fee ?? 0) * 12) +
        ($this->id_card_fee ?? 0) +
        ($this->report_card_fee ?? 0) +
        ($this->development_fee ?? 0) +
        (($this->art_craft_fee ?? 0) * 12) +
        (($this->sports_fee ?? 0) * 12);
}
}
