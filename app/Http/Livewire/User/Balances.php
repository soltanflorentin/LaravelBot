<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Balances extends Component
{
    protected $api;

    public function mount() 
    {
        $this->api = $this->initiateBinance();
    }

    public function render()
    {
        return view('livewire.user.balances', [
            'balances' => $this->getBalances(),
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

    public function getBalances() {
        $balanta = [];
        $balances = $this->api->balances();
        foreach($balances as $key => $balance) {
            if($balance['available'] > 0) {
                array_push($balanta, ['name' => $key, 'amound' => $balance['available'], 'USD_Value' => 50]);
            }
        }

        return $balanta;
    }

    // public function getUsdtValue($coin) 
    // {
    //     $parity = $coin . 'USDT';
    //     return $this->api->price('BTCUSDT');
    // }
}
