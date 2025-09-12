<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckIn extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'id');
    }
}
