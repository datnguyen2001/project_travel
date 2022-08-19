<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesTouristModel extends Model
{
    use HasFactory;
    protected $table = 'articles_tourist';
    protected $guarded = [];
}
