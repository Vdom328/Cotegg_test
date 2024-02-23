<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $table = "rooms";
    protected $guarded = [];

    public function roomImages()
    {
        return $this->hasMany(RoomImages::class, 'room_id');
    }
}
