<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultimediaFilesModel extends Model
{
    use HasFactory;
    protected $table = 'multimedia_files';
    protected $guarded = [];
}
