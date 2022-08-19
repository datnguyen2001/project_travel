<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesReviewModel extends Model
{
    use HasFactory;
    protected $table = 'articles_review';
    protected $guarded = [];
}
