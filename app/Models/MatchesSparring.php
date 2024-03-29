<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchesSparring extends Model
{
    use HasFactory;
    protected $table = 'matches_sparring';
    protected $guarded = [];

    public function userTimss()
    {
        return $this->belongsTo(UserTim::class, 'usertim_id');
    }
}
