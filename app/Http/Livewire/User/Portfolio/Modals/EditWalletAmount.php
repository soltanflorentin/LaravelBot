<?php

namespace App\Http\Livewire\User\Portfolio\Modals;

use Livewire\Component;

class EditWalletAmount extends Component
{
    public $isOpen = false;

    protected $listeners = [
        'edit-wallet-amount' => 'openModal',
    ];

    public function render()
    {
        return view('livewire.user.portfolio.modals.edit-wallet-amount', [

        ]);
    }

    public function openModal($data)
    {
        $this->isOpen = true;
    }
}
