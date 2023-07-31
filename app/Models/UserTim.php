<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usertim extends Model
{
    use HasFactory;
    protected $table = 'usertim';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function joinedPlayers()
    {
        return $this->belongsToMany(User::class, 'all_tim', 'usertim_id', 'user_id');
    }

    public function hostTim()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function playersTim()
    {
        return $this->belongsToMany(User::class, 'all_tim', 'usertim_id', 'user_id');
    }

    public function getJoinedSlotsTim()
    {
        $totalJoined = $this->joinedPlayers()->count();
        return $totalJoined . '/' . $this->max_member;
    }

    public function sparrings()
    {
        return $this->hasMany(UserSparring::class);
    }

}
