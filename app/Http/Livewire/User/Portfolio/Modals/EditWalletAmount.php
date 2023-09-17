<?php

namespace App\Http\Livewire\User\Portfolio\Modals;

use Livewire\Component;
use App\Models\Portfolio;
use Illuminate\View\View;

class EditWalletAmount extends Component
{
    public bool $isOpen = false;
    public ?Portfolio $portfolio = null;
    public string $wallet = '';
    public $amountValue = 0;

    protected $listeners = [
        'edit-wallet-amount' => 'initiateModal',
    ];

    public function rules(): array
    {
        return [
            'amountValue' => 'numeric|max:255'
        ];
    }

    public function render(): View
    {
        return view('livewire.user.portfolio.modals.edit-wallet-amount');
    }

    public function initiateModal($data): void
    {
        $this->isOpen = true;
        $this->portfolio = Portfolio::find($data['portfolioId']);
        $this->wallet = $data['wallet'];
        $this->amountValue = $data['amountValue'];

    }

    public function submit(): void
    {
        //dd($this->validate());
        $this->validate();

        $this->portfolio->fill([
            $this->wallet => $this->amountValue
        ]);

        $this->portfolio->save();

        $this->resetValues();

        $this->emit('refreshDatatable');

        $this->isOpen = false;
    }

    public function resetValues(): void
    {
        $this->isOpen = false;
        $this->portfolio = null;
        $this->wallet = '';
        $this->amountValue = 0;
    }

    public function openModal(): void
    {
        $this->isOpen = true;
    }
}
