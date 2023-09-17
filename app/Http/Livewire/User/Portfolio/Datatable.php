<?php

namespace App\Http\Livewire\User\Portfolio;

use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class Datatable extends Component
{
    public User $user;
    public ?string $newEntryCoin = '';
    public array $activeCoins = [];
    public $walletToEdit = '';
    public $fullCoinsMarket = '';
    public array $usdValuesList = [];
    public array $amountList = [];

    protected $listeners = [
        'refreshDatatable' => '$refresh',
    ];

    public function mount()
    {
        if(!Cache::get('selectable_coins_symbol_portfolio')) {
            Cache::put('selectable_coins_symbol_portfolio', $this->getCoinsSymbolForCache(), 10000);
        }

        if(!Cache::get('full_coins_market')) {
            Cache::put('full_coins_market', $this->getAllCoinsSymbolPriceArray(), 5000);
        }

        $this->fullCoinsMarket = Cache::get('full_coins_market');

        $this->activeCoins = $this->user->getPortfolios->pluck('symbol')->toArray();

        $this->amountList = $this->getAmountList();

        //$this->usdValuesList = $this->getUsdValuesList();

        $this->setNewEntryCoin();
    }

    public function render(): View
    {
        return view('livewire.user.portfolio.datatable', [
            'portfolios' => $this->getPortfolio(),
        ]);
    }

    public function getPortfolio()
    {
        return $this->user->getPortfolios;
    }

    // public function getUsdValuesList()
    // {

    // }

    public function getAmountList()
    {
        $portfolio = $this->user->getPortfolios->map(function ($item) {
            return [
                'symbol' => $item->symbol,
                'sum' =>  $item->ledger_main +
                $item->ledger_altcoins +
                $item->coinbase +
                $item->binance +
                $item->multivers_x +
                $item->crypto_com +
                $item->metamask +
                $item->trust_wallet +
                $item->etoro
            ];
        })->pluck('sum', 'symbol')->toArray();

        return $portfolio;
    }

    public function addNewCoin(): void
    {
        Portfolio::create(['symbol' => $this->newEntryCoin, 'user_id' => $this->user->id]);

        $this->emit('refreshDatatable');
    }

    public function deleteItem(Portfolio $item): void
    {
        $item->delete();

        $this->emit('refreshDatatable');
    }

    public function setNewEntryCoin(): void
    {
        $coin = $this->getCoinsProperty();

        $this->newEntryCoin = reset($coin);
    }


    public function getAllCoins($numberOfCoins)
    {
        $coinsRequest = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page='. $numberOfCoins .'&page=1&sparkline=false');

        $allCoins = $coinsRequest->collect();

        if(isset($allCoins['status'])) {
            dd('error CoinGeko try later');
        }
        return $allCoins;
    }

    public function getAllCoinsSymbolPriceArray()
    {
        $allCoins = $this->getAllCoins(200);

        return $allCoins->pluck('current_price', 'symbol')->toArray();
    }


    public function getCoinsProperty(): array
    {
        $coins = Cache::get('selectable_coins_symbol_portfolio');

        $activeCoins = $this->user->getPortfolios->pluck('symbol')->toArray();

        return array_diff(json_decode($coins), $activeCoins);

    }

    public function getCoinsSymbolForCache()
    {
        $coins = $this->getAllCoins(200)->pluck('symbol')->toArray();

        return json_encode($coins);
    }

    public function refreshMarketCoins(): void
    {
        $allCoins = $this->getAllCoinsSymbolPriceArray();

        Cache::put('full_coins_market', $allCoins, 1000);

        $this->emit('refreshDatatable');
    }

    public function deleteSelectableSymbolCoinsCache(): void
    {
        Cache::forget('selectable_coins_symbol_portfolio');

        $this->emit('refreshDatatable');
    }





    // public function getUsdtValue($coin)
    // {
    //     $parity = $coin . 'USDT';
    //     return $this->api->price('BTCUSDT');
    // }


}
