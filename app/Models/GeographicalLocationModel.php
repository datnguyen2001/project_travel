<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicalLocationModel extends Model
{
    use HasFactory;
    protected $table = "geographical_location";
    protected $guarded = [];
}
