<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSparring extends Model
{
    use HasFactory;
    protected $table = 'usersparring';
    protected $guarded = [];

    public function ambilsparring()
    {
        return $this->belongsTo(related: Versus::class);
    }  
}
