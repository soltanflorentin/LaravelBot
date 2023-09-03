@if (!isset($allCoins['status']))
    <div wire:poll.60s.visible>
        <div class="flex justify-between p-2"> 
            <div class="flex">
                <button wire:click='render' type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </button>   
                <div class="flex ml-4">
                    <div class="flex border px-3 py-1 hover:bg-gray-200 {{ !$favoriteCoinsOn ? 'bg-green-200' : null}}">
                        <button type="button" wire:click='swichToAllCoins'>All Coins</button>
                    </div>
                        @if(!$favoriteCoinsOn)
                            <div class="flex border px-3 py-1 ml-2 hover:bg-gray-200">
                                <button type="button" wire:click='swichToFavorites'>Favorites</button>
                        @endif 
                        @if ($favoriteCoinsOn)
                            <div class="flex border px-3 py-1 ml-2 hover:bg-gray-200 bg-green-200" wire:click="openAddFavoritesModal">
                                <button type="button">Favorites</button>  
                                <button type="button" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg> 
                                </button>     
                        @endif 
                            </div>  
                    <div class="ml-4">
                        <input type="text" placeholder="Search...">
                    </div>
                    <div wire:loading class="ml-10 pt-2 text-green-400">Loading…</div> 
                </div>  
            </div>
            <p>{{ $favoriteChange }}</p>
            <p>{{ now()->format('d/m/Y H:i') }}</p>
        </div>
        <table class="w-full">
            <thead>
                <th class="border px-4 py-2">&nbsp;</th> 
                <th class="border px-4 py-2">&nbsp;</th> 
                <th class="border px-4 py-2">Symbol</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Price</th>
                <th class="border px-4 py-2">24h</th>
                <th class="border px-4 py-2">ATH</th>
                @auth
                    <th class="border px-4 py-2">Actions</th>
                @endauth
            </thead>
            <tbody >
                @forelse ($allCoins as $coin)
                    <tr class="border">
                        <td class="flex justify-center">
                            <input type="checkbox" 
                                wire:click="$set('favoriteChange', '{{ $coin['symbol'] }}')"
                                value="{{ $coin['symbol'] }}" 
                                {{ in_array($coin['symbol'], $favoriteList) ? 'checked' : null }}
                            > 
                        </td>
                        <td class="border px-2 py-2 w-11"><img src="{{ $coin['image'] }}" alt="logo"></td>
                        <td class="border px-2 py-1 uppercase">{{ $coin['symbol'] }}</td>
                        <td class="border px-2 text-xl">{{ $coin['name'] }}</td>
                        <td class="border px-2 py-1">{{ $coin['current_price'] }}</td>
                        <td class="border px-2  text-black {{ $coin['price_change_percentage_24h'] < 0 ? 'bg-red-400' : 'bg-green-400' }}">
                            {{ number_format($coin['price_change_percentage_24h'], 2) }}
                        </td>
                        <td class="border px-4 py-1">{{ $coin['ath'] }}</td>
                        @auth
                            <td wire:click="tradeCoin" class="border px-4 py-1 text-center flex justify-center">
                                <a href="#" class="bg-green-400 text-black py-1 px-2 hover:bg-green-200">
                                    TRADE
                                </a>
                                <a href="{{ route('charts', ['symbol' => $coin['symbol']]) }}" class="bg-green-400 text-black py-1 px-2 hover:bg-green-200 ml-4">
                                    CHART
                                </a>
                            </td>
                        @endauth
                    </tr>
                @empty
                    <div class="text-center">
                        <h4 class="mt-1 mb-2 text-red-500">There are no favorite coins in your list.</h4> 
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@else
    <h4 class="text-red-500">
        {{ $allCoins['status']['error_message'] }}
    </h4>
@endif


