<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
    ];

    public function players()
    {
        return $this->belongsToMany(User::class, 'match_players', 'match_id', 'user_id');
    }
}
