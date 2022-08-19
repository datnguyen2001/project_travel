<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelGuideModel extends Model
{
    use HasFactory;
    protected $table = 'travel_guide';
    protected $guarded = [];
}
