<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyTrade extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'buy_price', 'usd_value', 'buy_id'];
}
