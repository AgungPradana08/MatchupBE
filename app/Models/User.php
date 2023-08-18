<?php

namespace App\Models;

use App\Models\UserTim;
use App\Models\UserSparring;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function userTim()
    {
        return $this->hasOne(UserTim::class);
    }
    
    public function posts()
    {
        return $this->hasMany(UserSparring::class);
    }

    public function poststim()
    {
        return $this->hasMany(UserTim::class);
    }

    public function postsmabar()
    {
        return $this->hasMany(UserMabar::class);
    }

    public function teams()
    {
        return $this->belongsToMany(UserTim::class, 'all_tim');
    }

    // Relasi dengan tabel pivot matches_sparring
    public function sparringTeams()
    {
        return $this->belongsToMany(UserTim::class, 'matches_sparring');
    }

    public function joinTim($usertimId)
    {
        $tim = UserTim::findOrFail($usertimId);
        $this->teams()->syncWithoutDetaching($tim);
    }

    public function joinSparring($usersparringId)
    {
        // Pastikan pengguna sudah bergabung dengan tim sebelumnya
        if ($this->teams->isEmpty()) {
            return false; // Atau tampilkan pesan peringatan bahwa pengguna harus bergabung dengan tim terlebih dahulu.
        }

        $sparring = UserSparring::findOrFail($usersparringId);
        $this->sparrings()->syncWithoutDetaching($sparring);
    }

    public function joinedTeams()
    {
        return $this->belongsToMany(UserTim::class, 'all_tim', 'user_id', 'usertim_id');
    }

    public function currentTeam()
    {
        return $this->hasOne(UserTim::class, 'id', 'usertim_id');
    }

    public function hostedTim()
    {
        return $this->hasOne(UserTim::class, 'host_id');
    }

    public function hostedTeams()
    {
        return $this->hasMany(UserTim::class, 'host_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'image',
        'username',
        'readnotif',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'image' => null,
    ];

    
    
}
