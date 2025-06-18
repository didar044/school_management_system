<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;
use App\Models\Library\Book;
use App\Models\Student\Student;

class BookIssue extends Model
{
    protected $fillable = [
    'book_id',
    'student_id',
    'issue_date',
    'due_date',
    'return_date',
    'fine',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
