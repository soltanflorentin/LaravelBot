@props(['active' => false, 'title' => ''])

<div
    class="relative"
    x-data="{ open: @json($active) }"
>
    <x-sidebar.link
        collapsible
        title="{{ $title }}"
        @click="open = !open"
        isActive="{{ $active }}"
    >
        @if ($icon ?? false)
            <x-slot name="icon">
                {{ $icon }}
            </x-slot>
        @endif
    </x-sidebar.link>

    <div x-show="open && (isSidebarOpen || isSidebarHovered)">
        <ul
            class="relative ml-5 px-0 pb-0 pt-2 before:absolute before:inset-y-0 before:left-0 before:block before:w-0 before:border-l-2 before:border-l-gray-200 dark:before:border-l-gray-600">

            {{ $slot }}
        </ul>
    </div>
</div>
