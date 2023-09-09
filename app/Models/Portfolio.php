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



// for testing to fake pupulate the table
    public static function createPortfolio()
    {
        $data = [
            'user_id' => 2,
            'symbol' => 'BTC',
            'ledger_main' => 2,
            'ledger_altcoins' => 8,
            'coinbase' => 20.00,
            'binance' => null,
            'multivers_x' => 15.00,
            'crypto_com' => 5,
            'metamask' => 120.00,
            'trust_wallet' => null,
            'etoro' => 25.00,
        ];

        return self::create($data);
    }
}

