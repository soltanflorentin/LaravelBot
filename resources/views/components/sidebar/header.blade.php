<div class="flex flex-shrink-0 items-center justify-between px-3">
    <!-- Logo -->
    <a
        x-show="isSidebarOpen"
        href="{{ route('dashboard') }}"
        class="inline-flex items-center gap-2"
    >
        <x-application-logo class="w-20" />
    </a>

    <!-- Toggle button -->
    <x-button
        type="button"
        iconOnly
        srText="Toggle sidebar"
        variant="secondary"
        x-show="isSidebarOpen || isSidebarHovered"
        @click="isSidebarOpen = !isSidebarOpen"
    >
        <x-icons.menu-fold-right
            x-show="!isSidebarOpen"
            aria-hidden="true"
            class="hidden h-6 w-6 lg:block"
        />
        <x-icons.menu-fold-left
            x-show="isSidebarOpen"
            aria-hidden="true"
            class="hidden h-6 w-6 lg:block"
        />
        <x-heroicon-o-x
            aria-hidden="true"
            class="h-6 w-6 lg:hidden"
        />
    </x-button>
</div>
