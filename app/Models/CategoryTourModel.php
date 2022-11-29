<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTourModel extends Model
{
    use HasFactory;
    protected $table = 'category_tour';
    protected $guarded = [];
}
