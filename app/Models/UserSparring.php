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

    public function SparringTims()
    {
        return $this->belongsTo(UserTim::class. 'usertim_id');
    }

    public function hostSparring()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function joinedSparrings()
    {
        return $this->belongsToMany(User::class, 'matches_sparring', 'usersparring_id', 'user_id')
            ->withPivot('nama_tim_lawan'); // Add the pivot data here
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

    protected static function boot()
    {
        parent::boot();

        // Gunakan event "creating" untuk mengisi usertim_id
        self::creating(function ($usersparring) {
            // Ambil usertim_id dari relasi 'teams' pada model 'User'
            $usersparring->usertim_id = $usersparring->user->teams->first()->pivot->usertim_id;
        });
    }

    public function sparringTeams()
    {
        return $this->belongsToMany(UserTim::class, 'matches_sparring', 'usersparring_id', 'usertim_id')
            ->withPivot('nama_tim_lawan');
    }
}
