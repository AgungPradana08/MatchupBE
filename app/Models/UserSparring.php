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

    public function team()
    {
        return $this->belongsTo(UserTim::class, 'tim_id');
    }
    
    public function maps(){
        return $this->hasMany(Map::class);
    }

    public function SparringTims()
    {
        return $this->belongsTo(UserTim::class, 'usertim_id');
    }

    public function hostSparring()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function joinedSparrings()
    {
        return $this->belongsToMany(User::class, 'matches_sparring', 'usersparring_id', 'user_id')
            ->withPivot('usertim_id', 'nama_tim_lawan', 'image_tim_lawan'); // Add the pivot data here
    }

    public function orders()
    {
        return $this->belongsToMany(User::class, 'order',)
            ->withPivot('nama', 'total_price', 'quantity'); // Add the pivot data here
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

    public function userTeams()
    {
        return $this->hasOne(UserTim::class);
    }

    public function removeTeam($usertimId)
    {
        $this->joinedSparrings()->detach($usertimId);

        // Set kolom nama_tim_lawan dan image_tim_lawan menjadi null di pivot table
        $this->joinedSparrings()->updateExistingPivot($usertimId, [
            'nama_tim_lawan' => null,
            'image_tim_lawan' => null,
        ]);
    }
    

    public function TerjoinedTeams()
    {
        return $this->belongsToMany(UserTim::class, 'matches_sparring', 'usersparring_id', 'usertim_id')
            ->withPivot('nama_tim_lawan', 'image_tim_lawan');
    }

    
}
