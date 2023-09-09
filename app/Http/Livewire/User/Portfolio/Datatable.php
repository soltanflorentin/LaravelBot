<?php

namespace App\Http\Livewire\User\Portfolio;

use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Http;

class Datatable extends Component
{
    protected $api;
    public User $user;

    public function mount() 
    {
        //for testing to fakepopulate portofolio table
        //Portfolio::createPortfolio(); 

        $this->api = $this->initiateBinance();
    }

    public function render()
    {
        //dd($this->user->getPortfolios);
        return view('livewire.user.portfolio.datatable', [
            'portfolios' => $this->getPortfolio(),
        ]);
    }

    public function initiateBinance() 
    {
        $api = new \Binance\API(config('app.binanace_api_key'), config('app.binanace_secret_key'));
        $api->useServerTime();

        //dd($api->test());
        //dd($api->balances($api->prices())); //ne da mai complex raspunsul cu tot cu available si in order
        return $api;
    }

    public function getPortfolio() 
    {
        return $this->user->getPortfolios;
    }

    // public function getAllCoins() 
    // {
    //     $coinsRequest = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false');
        
    //     $allCoins = $coinsRequest->collect();

    //     return $allCoins;  
    // }

    // public function getUsdtValue($coin) 
    // {
    //     $parity = $coin . 'USDT';
    //     return $this->api->price('BTCUSDT');
    // }

    
}
