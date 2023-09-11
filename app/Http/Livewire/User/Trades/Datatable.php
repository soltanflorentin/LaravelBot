<?php

namespace App\Http\Livewire\User\Trades;

use App\Models\Buy;
use App\Models\BuyTrade;
use App\Models\SellTrade;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Datatable extends Component
{
    public $buys;
    public $allCoins;

    public function mount()
    {

        $this->buys = Buy::all();
        $this->allCoins = $this->getAllCoins();
        //$this->getIdBasedOnSymbol('btc');
    }

    public function render()
    {
        return view('livewire.user.trades.datatable', [
            'buys' => $this->buys,
        ]);
    }

    public function getAllCoins()
    {
        $coinsRequest = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&per_page=50&page=1&sparkline=false');
        $allCoins = $coinsRequest->collect()->pluck('id', 'symbol');

        return $allCoins;
    }

    public function getCoinValue($coin)
    {
        $coinRequest = Http::get('https://api.coingecko.com/api/v3/simple/price?ids='. $coin . '&vs_currencies=usd');
        $coin = json_decode($coinRequest);

        return $coin->bitcoin->usd;
    }

    public function getIdBasedOnSymbol($symbol)
    {

        foreach($this->allCoins as $key => $id) {
            if($symbol == $key) {

                return $id;
            }
        }
    }
}
