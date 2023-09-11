<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellTrade extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'sell_price', 'sell_profit', 'buy_id', 'usd_value'];

    public function buy_trades()
    {
        return $this->belongsTo(BuyTrade::class);
    }
}
