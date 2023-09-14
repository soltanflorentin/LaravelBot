<div x-data="{ open: @entangle('isOpen') }">
    <div
        x-show="open"
        class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-gray-800 bg-opacity-40"
    >
        <div class="relative w-64 rounded-lg bg-white p-6">
            <form
                wire:submit.prevent="saveAmount"
                @click.away="open = false"
            >
                <div class="mb-4">
                    <label
                        for="amount"
                        class="mb-2 block font-bold text-gray-700"
                    >Insert the amount:</label>
                    <input
                        wire:model="amount"
                        type="number"
                        id="amount"
                        name="amount"
                        class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    >
                </div>
                <div class="text-center">
                    <button
                        type="submit"
                        class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
