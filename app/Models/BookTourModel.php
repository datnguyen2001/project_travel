<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTourModel extends Model
{
    use HasFactory;
    protected $table = 'book_tour';
    protected $guarded = [];
}
