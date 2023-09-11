<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;

    protected $fillable = ['symbol',
    'amount',
    'avg_price',
    'avg_value',
    'amount_left'];

    public function sellTrades()
    {
        return $this->hasMany(SellTrade::class);
    }

    public function buyTrades()
    {
        return $this->hasMany(BuyTrade::class);
    }
}
