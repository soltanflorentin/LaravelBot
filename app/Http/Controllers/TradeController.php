<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\BuyTrade;
use App\Models\SellTrade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
   public function index(SellTrade $sell, BuyTrade $buy) 
   {
     //    Buy::create([
     //        'symbol' => 'BTC',
     //        'amount' => 0.01,
     //        'avg_price' => 20000,
     //        'avg_value' => 500,
     //        'amount_left' => 0.01
     //    ]);

     //    BuyTrade::create([
     //        'amount' => 200,
     //        'buy_price' => 25000,
     //        'usd_value' => 50000,
     //        'buy_id' => 1
     //    ]);

     //    SellTrade::create([
     //        'amount' => 5,
     //        'sell_price' => 21000,
     //        'sell_profit' => -900,
     //        'usd_value' => 300,
     //        'buy_id' => 1
     //    ]);
     
       
        return view('user.trades');
     //    return view('user.trades', ['buys' => $buy->all()]);
   }

   public function show() 
   {
        return view('components.trades.index');
   }

   public function create() 
   {
        return view('components.trades.index');
   }


}
