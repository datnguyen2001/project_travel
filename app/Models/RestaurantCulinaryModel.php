<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCulinaryModel extends Model
{
    use HasFactory;
    protected $table = 'restaurant_culinary';
    protected $guarded = [];
}
