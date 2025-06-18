<?php

namespace App\Models\Batch;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;
use App\Models\Student\Expense;

class Classe extends Model
{
    public function expense()
    {
        return $this->hasOne(Expense::class, 'classe_id');
    }

    // You might also have students:
    public function students()
    {
        return $this->hasMany(Student::class,'classe_id');
    }
}
