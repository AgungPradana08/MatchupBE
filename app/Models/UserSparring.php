<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSparring extends Model
{
    use HasFactory;
    protected $table = 'usersparring';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function maps(){
        return $this->hasMany(Map::class);
    }
}
