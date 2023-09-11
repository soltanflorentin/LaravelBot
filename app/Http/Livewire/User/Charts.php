<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Charts extends Component
{
    public $symbol;
    public $viewSymbol;
    public $active = false;

    public function mount()
    {
        $this->viewSymbol = "BINANCE:" . $this->symbol . "USDT";
    }

    public function render()
    {
        return view('livewire.user.charts');
    }


}
