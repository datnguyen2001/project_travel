<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulinaryModel extends Model
{
    use HasFactory;
    protected $table = 'culinary';
    protected $guarded = [];
}
