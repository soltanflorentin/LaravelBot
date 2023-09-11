<div class="flex-shrink-0 px-3 lg:hidden">
    <x-button
        type="button"
        iconOnly
        variant="secondary"
        x-show="!isSidebarOpen"
        @click="isSidebarOpen = !isSidebarOpen"
        srText="Toggle sidebar"
    >
        <x-icons.menu-fold-left
            x-show="isSidebarOpen"
            class="h-6 w-6"
        />
        <x-icons.menu-fold-right
            x-show="!isSidebarOpen"
            class="h-6 w-6"
        />
    </x-button>
</div>
