<div class="">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Portfolio
            </h2>
        </div>
    </x-slot>
    <div
        class="flex flex-col"
        x-data="{
            newEntry: false,
            openEditModal: false,
        }"
    >
        <div class="-my-2 overflow-x-auto py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="inline-block min-w-full overflow-hidden border-b border-gray-200 align-middle shadow sm:rounded-lg">
                <div class="flex h-10 items-center gap-5">

                    <button @click="newEntry= !newEntry">
                        <x-heroicon-o-plus
                            aria-hidden="true"
                            class="ml-2 h-6 w-6 text-slate-600"
                        />
                    </button>
                    <div
                        x-show="newEntry"
                        class="ml-2 flex h-10 gap-2"
                    >
                        <select
                            name="coins"
                            wire:model="newEntryCoin"
                        >
                            @foreach ($this->coins as $option)
                                <option value="{{ $option }}">
                                    {{ strtoupper($option) }}
                                </option>
                            @endforeach
                        </select>

                        {{-- <x-forms.form-select
                            wire:model="newEntryCoin"
                            name="coins"
                            label="Select a coin"
                            :options="$this->coins"
                        />  --}}
                        <x-button
                            variant='blue'
                            wire:click="addNewCoin()"
                            @click="newEntry= !newEntry"
                        >
                            Add
                        </x-button>
                    </div>
                </div>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Name
                            </th>
                            <th
                                title="Refresh"
                                wire:click="refreshMarketCoins"
                                class="cursor-pointer gap-1 border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700"
                            >
                                <span class="flex items-center justify-center gap-1">
                                    Price
                                    <x-heroicon-o-refresh class="w-4" />
                                </span>
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-slate-600">
                                Amount
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Usd Value
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Ledger Main
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Ledger Altcoins
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Coinbase
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Binance
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                MultiversX
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                CryptoCom
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Metamask
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Trust Wallet
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Etoro
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-center text-xs font-medium uppercase leading-4 tracking-wider text-gray-700">
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($portfolios as $portfolio)
                            <tr>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center gap-1">
                                        {{-- <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full" src="https://source.unsplash.com/user/erondu"
                                                alt="admin dashboard ui">
                                        </div> --}}
                                        <p class="text-center text-sm font-medium leading-5 text-slate-700">
                                            {{ strtoupper($portfolio->symbol) }}
                                        </p>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <p>{{ $fullCoinsMarket[$portfolio->symbol] }}</p>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <p>{{ $amountList[$portfolio->symbol] }}</p>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <p>{{ $amountList[$portfolio->symbol] * $fullCoinsMarket[$portfolio->symbol] }}
                                        </p>
                                    </div>
                                </td>

                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="Livewire.emit('edit-wallet-amount', {{ json_encode([
                                                'portfolioId' => $portfolio->id,
                                                'wallet' => 'ledger_main',
                                                'amountValue' => $portfolio->ledger_main ?? 0,
                                            ]) }})"
                                        >
                                            {{ $portfolio->ledger_main ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="Livewire.emit('edit-wallet-amount', {{ json_encode([
                                                'portfolioId' => $portfolio->id,
                                                'wallet' => 'ledger_altcoins',
                                                'amountValue' => $portfolio->ledger_altcoins ?? 0,
                                            ]) }})"
                                        >
                                            {{ $portfolio->ledger_altcoins ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="Livewire.emit('edit-wallet-amount', {{ json_encode([
                                                'portfolioId' => $portfolio->id,
                                                'wallet' => 'coinbase',
                                                'amountValue' => $portfolio->coinbase ?? 0,
                                            ]) }})"
                                        >
                                            {{ $portfolio->coinbase ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="openEditModal = true"
                                        >
                                            {{ $portfolio->binance ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="openEditModal = true"
                                        >
                                            {{ $portfolio->multivers_x ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="openEditModal = true"
                                        >
                                            {{ $portfolio->crypto_com ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="openEditModal = true"
                                        >
                                            {{ $portfolio->metamask ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="openEditModal = true"
                                        >
                                            {{ $portfolio->trust_wallet ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center text-sm leading-5 text-gray-500">
                                    <div class="">
                                        <button
                                            type="button"
                                            @click="openEditModal = true"
                                        >
                                            {{ $portfolio->etoro ?? 0 }}
                                        </button>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-center">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">

                                        <button wire:click="deleteItem({{ $portfolio->id }})">
                                            <x-heroicon-o-trash
                                                aria-hidden="true"
                                                class="ml-1 h-4 w-4 text-red-400"
                                            />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <h6 class="mb-3 text-center text-lg italic text-red-400">
                                    There are no coins in your portfolio.
                                </h6>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
