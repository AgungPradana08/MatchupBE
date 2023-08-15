<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMabar extends Model
{
    use HasFactory;
    protected $table = 'usermabar';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function joinedUsers()
    {
        return $this->belongsToMany(User::class, 'matches_mabar', 'usermabar_id', 'user_id');
    }

    public function host()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function players()
    {
        return $this->belongsToMany(User::class, 'matches_mabar', 'usermabar_id', 'user_id')
        ->orderBy('matches_mabar.id');

    }

    public function getJoinedSlotsAttribute()
    {
        $totalJoined = $this->joinedUsers()->count();
        return $totalJoined . '/' . $this->max_member;
    }
}
