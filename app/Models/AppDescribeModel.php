<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDescribeModel extends Model
{
    use HasFactory;
    protected $table = 'app_describe';
    protected $guarded = [];
}
