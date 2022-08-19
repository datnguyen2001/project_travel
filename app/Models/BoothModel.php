<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoothModel extends Model
{
    use HasFactory;
    protected $table = 'booth';
    protected $guarded = [];
}
