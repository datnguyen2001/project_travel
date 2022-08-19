<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelArticlesModel extends Model
{
    use HasFactory;
    protected $table = 'travel_articles';
    protected $guarded = [];
}
