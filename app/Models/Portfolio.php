<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'symbol',
        'ledger_main',
        'ledger_altcoins',
        'coinbase',
        'binance',
        'multivers_x',
        'crypto_com',
        'metamask',
        'trust_wallet',
        'etoro',
    ];
}
