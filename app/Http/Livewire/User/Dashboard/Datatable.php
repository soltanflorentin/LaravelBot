<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\User;
use App\Models\UserFavoriteCoins;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class Datatable extends Component
{
        public bool $favoriteCoinsOn = false;
        public array $favoriteList = [];
        public string $favoriteChange = '';
        public ?User $user = null;

        protected $rules = [
            'symbol' => 'required|string',
        ];

        public function mount() 
        {
           $this->user = auth()->user();
           $this->favoriteList = $this->getFavorites()->pluck('symbol')->all();
        }

        public function render()
        {
            return view('livewire.user.dashboard.datatable',[
                'allCoins' => $this->refreshTable(),
            ]);
        }
        
        public function refreshTable() 
        {
            $allCoins = $this->getAllCoins();

            if($this->favoriteCoinsOn) {
                $favorites = $allCoins->filter(function($item) {
                    if(in_array($item['symbol'], $this->favoriteList)) {
                        return $item;
                    } 
               });

               return $favorites; 
            }
            return $allCoins;
        }

        public function getAllCoins() 
        {
           $coinsRequest = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false');
          
           $allCoins = $coinsRequest->collect();

           return $allCoins;  
        }

        public function refreshFavorites(): void 
        {
            $this->favoriteList = $this->getFavorites()->pluck('symbol')->all();
        }

        public function getFavorites() 
        {
            return $this->user->getFavorites;
        }

        public function swichToFavorites(): void 
        {
            $this->favoriteCoinsOn = true;
        }

        public function swichToAllCoins() 
        {
            $this->favoriteCoinsOn = false;
        }

        public function resetFavoriteChange(): void 
        {
            $this->reset('favoriteChange');
        }

        public function updatedFavoriteChange(): void 
        {
            if(in_array($this->favoriteChange, $this->favoriteList)) {
                $this->removeFavorite($this->favoriteChange);
            } else {
                $this->addFavorite($this->favoriteChange);
            }
        }

        public function removeFavorite($favoriteCoin): void 
        {
            $coin = UserFavoriteCoins::where('symbol', $favoriteCoin)->where('user_id', $this->user->id)->first();
    
            if($coin != null) {
                $coin->delete();
            }else {
                dd('error remove favorite'); //In caz extraordinar ca $coin este null 
            }
            
            $this->resetFavoriteChange();
            $this->favoriteList = array_diff($this->favoriteList, array($favoriteCoin));
            
            $this->render();
        }

        public function addFavorite($favoriteCoin):void
        {
            //$validate = $this->validate($favoriteCoin);

            UserFavoriteCoins::create(['symbol' => $favoriteCoin, 'user_id' => $this->user->id]);

            $this->resetFavoriteChange();
            array_push($this->favoriteList, $favoriteCoin);
            
            $this->render();
        }

        public function openAddFavoritesModal() 
        {
            
        }
   
}
