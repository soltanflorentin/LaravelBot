<div>   
    <div class="flex flex-col mt-8">
        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div  class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                @forelse ($buys as $buy)
                    <div x-data="{open : false}">
                        <table class="min-w-full border-b-4 border-gray-400">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        &nbsp;
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        &nbsp;
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Date
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Amount
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Avg Price</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Avg Value
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Amount Left
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Value
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white transition duration-700 ease-in-out" >
                                <tr>
                                    <td class="px-4 py-4 text-gray-500 whitespace-no-wrap border-b border-gray-200 " x-on:click="open = ! open">
                                        <svg class="w-6 h-6 " :class="{'-rotate-90': !open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </td>
                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                {{-- <img class="w-10 h-10 rounded-full" src="https://source.unsplash.com/user/erondu"
                                                    alt="admin dashboard ui"> --}}
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900 uppercase">
                                                    {{ $buy->symbol }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        <div class="text-sm leading-5 text-gray-500">{{ $buy->created_at->format('d:m:Y H:i') }} <br> {{ $buy->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200 text-center">
                                        {{ $buy->amount_left }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200 text-center">
                                        {{ $buy->avg_price }}$
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200 text-center">
                                        {{ $buy->avg_value }}$
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200 text-center">
                                        {{ $buy->amount_left }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200 text-center">
                                        {{ $this->getCoinValue($this->getIdBasedOnSymbol($buy->symbol)) * $buy->amount_left }}$
                                
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 flex text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                        
                                        <svg class="w-6 h-6 ml-2 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2 text-red-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <svg class="w-6 h-6 ml-2 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </td>
                                </tr>
                            
                                <tbody x-show="open">
                                    <tr class="border-b-4 border-gray-400">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>DATE</th>
                                        <th>AMOUNT</th>
                                        <th>PRICE</th>
                                        <th>VALUE</th>
                                        <th>PROFIT</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    
                                    @forelse ($buy->sellTrades as $sell)
                                        <tr class="border-b-2 border-gray-400">
                                            <td class="text-center text-red-400">SELL</td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div class="text-sm leading-5 text-center">{{ $sell->created_at->format('d:m:Y H:i') }} <br> {{ $sell->created_at->diffForHumans() }}</div>
                                            </td>
                                            <td class="text-center">{{ $sell->amount }}</td>
                                            <td class="text-center">{{ $sell->sell_price }}$</td>
                                            <td class="text-center">{{ $sell->usd_value }}$</td>
                                            <td class="text-center {{ $sell->sell_profit < 0 ? 'text-red-400' : 'text-green-400' }}">{{ $sell->sell_profit }}<span class="text-gray-200">$</span></td>
                                            <td class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2 text-red-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>    
                                            </td>
                                        </tr>
                                    @empty
                                        {{-- No Sells for this buy. --}}
                                    @endforelse
                                    @forelse ($buy->buyTrades as $buy)
                                        <tr class="border-b-2 border-gray-400">
                                            <td class="text-center text-green-400">BUY</td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div class="text-sm leading-5 text-center">{{ $buy->created_at->format('d:m:Y H:i') }} <br> {{ $buy->created_at->diffForHumans() }}</div>
                                            </td>
                                            <td class="text-center">{{ $buy->amount }}</td>
                                            <td class="text-center">{{ $buy->buy_price }}$</td>
                                            <td class="text-center">{{ $buy->usd_value }}$</td>
                                            <td>&nbsp;</td>
                                            <td class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2 text-red-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>    
                                            </td>
                                        </tr>
                                    @empty
                                        {{-- No Sells for this buy. --}}
                                    @endforelse
                                </tbody> 

                            </tbody>
                        </table>
                    </div>  
                @empty
                    <p>no buys</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
   

