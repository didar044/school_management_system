<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publisher',
        'year_published',
        'copies_total',
        'copies_available',
    ];
}
