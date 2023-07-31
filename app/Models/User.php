<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserTim;
use App\Models\UserSparring;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'username',
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
