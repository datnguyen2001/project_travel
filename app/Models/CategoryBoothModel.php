<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBoothModel extends Model
{
    use HasFactory;
    protected $table = 'category_booth';
    protected $guarded = [];
}
