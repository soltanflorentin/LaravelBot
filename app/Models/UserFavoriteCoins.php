<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteCoins extends Model
{
    use HasFactory;

    protected $fillable = ['symbol', 'user_id'];
}
