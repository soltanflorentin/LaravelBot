<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Bot') }}
            </h2>
            {{-- <x-button target="_blank" href="#" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Visit me on Github</span>
            </x-button> --}}
        </div>
    </x-slot>

    <div class="overflow-hidden rounded-md bg-white p-6 shadow-md dark:bg-dark-eval-1">
        <livewire:user.bot />
    </div>
</x-app-layout>
