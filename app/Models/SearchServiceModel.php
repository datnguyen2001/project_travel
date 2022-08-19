<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchServiceModel extends Model
{
    use HasFactory;
    protected $table = 'search_service';
    protected $guarded = [];
}
