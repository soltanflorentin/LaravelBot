<?php

namespace App\Http\Livewire\User\Portfolio;

use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class Datatable extends Component
{
    public User $user;
    public ?string $newEntryCoin = '';
    public array $activeCoins = [];

    protected $listeners = [
        'refreshDatatable' => '$refresh',
    ];

    public function mount()
    {
        //for testing to fake populate portofolio table
        //Portfolio::createPortfolio();

        if(!Cookie::get('selectable_coins_symbol_portfolio')) {
            \Cookie::queue(\Cookie::forever('selectable_coins_symbol_portfolio', $this->getCoinsForCookie(), 10000));
        }

        $this->activeCoins = $this->user->getPortfolios->pluck('symbol')->toArray();

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

        return $allCoins;
    }


    public function getCoinsProperty(): array
    {
        $coins = Cookie::get('selectable_coins_symbol_portfolio');
        $activeCoins = $this->user->getPortfolios->pluck('symbol')->toArray();

        return array_diff(json_decode($coins), $activeCoins);

    }

    public function getCoinsForCookie()
    {
        $coins = $this->getAllCoins(200)->pluck('symbol')->toArray();

        return json_encode($coins);
    }

    public function deleteCookie(): void
    {
        \Cookie::queue(\Cookie::forget('selectable_coins_symbol_portfolio'));

        $this->emit('refreshDatatable');
    }















    // public function getUsdtValue($coin)
    // {
    //     $parity = $coin . 'USDT';
    //     return $this->api->price('BTCUSDT');
    // }


}
