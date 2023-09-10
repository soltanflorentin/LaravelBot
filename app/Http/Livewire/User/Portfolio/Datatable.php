<?php

namespace App\Http\Livewire\User\Portfolio;

use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Http;

class Datatable extends Component
{
    public User $user;
    public ?string $newEntryCoin = '';
    public array $activeCoins = [];

    public function mount()
    {
        //for testing to fakepopulate portofolio table
        //Portfolio::createPortfolio();

        $this->newEntryCoin = $this->coins[0];
        $this->activeCoins = $this->user->getPortfolios->pluck('symbol')->toArray();
    }

    public function render()
    {
        //dd($this->user->getPortfolios);
        return view('livewire.user.portfolio.datatable', [
            'portfolios' => $this->getPortfolio(),
        ]);
    }

    public function getPortfolio()
    {
        return $this->user->getPortfolios;
    }

    public function getCoinsProperty()
    {
        $coins = $this->getAllCoins(200)->pluck('symbol')->toArray();

        //dd(array_diff($coins, $this->activeCoins));
        return array_diff($coins, $this->activeCoins);
    }

    public function addNewCoin()
    {
        Portfolio::create(['symbol' => $this->newEntryCoin, 'user_id' => $this->user->id]);

        $this->render();
    }

    public function getAllCoins($numberOfCoins)
    {
        $coinsRequest = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page='. $numberOfCoins .'&page=1&sparkline=false');

        $allCoins = $coinsRequest->collect();

        return $allCoins;
    }















    // public function getUsdtValue($coin)
    // {
    //     $parity = $coin . 'USDT';
    //     return $this->api->price('BTCUSDT');
    // }


}
