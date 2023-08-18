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

    public function teamLeader()
    {
        return $this->belongsTo(User::class, 'team_leader_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Gunakan event "creating" untuk mengisi kolom host_id
        self::creating(function ($usertim) {
            $usertim->host_id = auth()->id();
        });
    }

    public function cekPlayer(){
        return $this->belongsToMany(User::class, 'all_tim', 'usertim_id', 'user_id');
    }
}
