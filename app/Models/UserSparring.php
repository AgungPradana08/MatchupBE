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

    public function hostSparring()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function joinedSparrings()
    {
        return $this->belongsToMany(User::class, 'matches_sparring', 'usersparring_id', 'user_id');
    }

    public function playerSparring()
    {
        return $this->belongsToMany(User::class, 'matches_sparring', 'usersparring_id', 'user_id');
    }

    public function getJoinedSlotSparring()
    {
        $totalJoined = $this->joinedSparrings()->count();
        return $totalJoined . '/' . $this->max_member;
    }
}
