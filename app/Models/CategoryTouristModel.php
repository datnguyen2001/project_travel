<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTouristModel extends Model
{
    use HasFactory;
    protected $table = 'category_tourist';
    protected $guarded = [];
}
