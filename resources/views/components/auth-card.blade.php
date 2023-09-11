<main class="flex flex-1 flex-col items-center px-4 pt-6 sm:justify-center">
    <div>
        <a
            href="{{ route('dashboard') }}"
            class="inline-flex items-center gap-2"
        >
            <x-application-logo class="w-20" />
        </a>
    </div>

    <div class="my-6 w-full overflow-hidden rounded-md bg-white px-6 py-4 shadow-md dark:bg-dark-eval-1 sm:max-w-md">
        {{ $slot }}
    </div>
</main>
