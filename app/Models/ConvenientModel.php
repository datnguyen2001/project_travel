<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvenientModel extends Model
{
    use HasFactory;
    protected $table = 'convenient';
    protected $guarded = [];
}
