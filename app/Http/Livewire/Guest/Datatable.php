<?php

namespace App\Http\Livewire\Guest;

use Illuminate\Support\Facades\Http;

use Livewire\Component;

class Datatable extends Component
{
    public function render()
    {
        return view('livewire.guest.datatable', [
            'allCoins' => $this->getAllCoins(),
        ]);
    }

    public function getAllCoins()
    {
        $coinsRequest = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false');

        $allCoins = $coinsRequest->collect();

        return $allCoins;
    }
}
