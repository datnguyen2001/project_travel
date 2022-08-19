<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRoomModel extends Model
{
    use HasFactory;
    protected $table = 'book_room';
    protected $fillable = [
        'name_customer',
        'phone_customer',
        'email_customer',
        'room_id',
        'name_room',
        'name_hotel',
        'phone_hotel',
        'status',
        'type',
        'content'
    ];
}
