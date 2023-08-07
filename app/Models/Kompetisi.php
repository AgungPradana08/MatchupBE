<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetisi extends Model
{
    use HasFactory;
    protected $table = 'kompetisi';
    protected $guarded = [];

    public function userkompetisi()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function joinedKompetisi()
    {
        return $this->belongsToMany(User::class, 'matches_kompetisi', 'kompetisi_id', 'user_id');
    }

    public function hostKompetisi()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function playersKompetisi()
    {
        return $this->belongsToMany(User::class, 'matches_kompetisi', 'kompetisi_id', 'user_id');
    }

    public function getJoinedSlotsAttribute()
    {
        $totalJoined = $this->joinedKompetisi()->count();
        return $totalJoined . '/' . $this->max_member;
    }
}
