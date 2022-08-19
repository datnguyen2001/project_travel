<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraditionPeopleModel extends Model
{
    use HasFactory;
    protected $table = 'tradition_people';
    protected $guarded = [];
}
