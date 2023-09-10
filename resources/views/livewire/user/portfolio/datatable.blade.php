<div class="relative">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Portfolio
            </h2>
        </div>
    </x-slot>
    <div
        class="flex flex-col"
        x-data="{ newEntry: false }"
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
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Name
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Price
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-slate-600">
                                Amount
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Usd Value
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Ledger Main
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Ledger Altcoins
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Coinbase
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Binance
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                MultiversX
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                CryptoCom
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Metamask
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Trust Wallet
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Etoro
                            </th>
                            <th
                                class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        {{-- <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full" src="https://source.unsplash.com/user/erondu"
                                                alt="admin dashboard ui">
                                        </div> --}}
                                        <div class="text-sm font-medium leading-5 text-slate-700">
                                            {{ $portfolio->symbol }}
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <p>100</p>

                                        <button>
                                            <x-heroicon-o-pencil
                                                aria-hidden="true"
                                                class="ml-1 h-4 w-4 text-green-400"
                                            />
                                        </button>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <p>100</p>
                                        <button>
                                            <x-heroicon-o-pencil
                                                aria-hidden="true"
                                                class="ml-1 h-4 w-4 text-green-400"
                                            />
                                        </button>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <p>100</p>
                                        <button>
                                            <x-heroicon-o-pencil
                                                aria-hidden="true"
                                                class="ml-1 h-4 w-4 text-green-400"
                                            />
                                        </button>
                                    </div>
                                </td>

                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->ledger_main }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->ledger_altcoins }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->coinbase }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->binance }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->multivers_x }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->crypto_com }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->metamask }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->trust_wallet }}
                                </td>
                                <td
                                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500">
                                    {{ $portfolio->etoro }}
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                                    <div class="flex items-center justify-center text-sm leading-5 text-slate-500">
                                        <x-heroicon-o-trash
                                            aria-hidden="true"
                                            class="ml-1 h-4 w-4 text-red-400"
                                        />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
