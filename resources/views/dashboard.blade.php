<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Chart') }}
            </h2>
            <x-button
                target="_blank"
                href="https://github.com/kamona-wd/kui-laravel-breeze"
                variant="black"
                class="max-w-xs justify-center gap-2"
            >

            </x-button>
        </div>
    </x-slot>

    <div class="overflow-hidden rounded-md bg-white p-6 shadow-md dark:bg-dark-eval-1">
        <livewire:user.dashboard.datatable />
    </div>
</x-app-layout>
