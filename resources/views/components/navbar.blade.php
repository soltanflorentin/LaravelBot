<nav
    aria-label="secondary"
    x-data="{ open: false }"
    class="sticky top-0 z-10 flex items-center justify-between bg-white px-4 py-4 transition-transform duration-500 dark:bg-dark-eval-1 sm:px-6"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }"
>

    <div class="flex items-center gap-3">
        <x-button
            type="button"
            class="md:hidden"
            iconOnly
            variant="secondary"
            srText="Toggle dark mode"
            @click="toggleTheme"
        >
            <x-heroicon-o-moon
                x-show="!isDarkMode"
                aria-hidden="true"
                class="h-6 w-6"
            />
            <x-heroicon-o-sun
                x-show="isDarkMode"
                aria-hidden="true"
                class="h-6 w-6"
            />
        </x-button>
    </div>

    <div class="flex items-center gap-3">
        <x-button
            type="button"
            class="hidden md:inline-flex"
            iconOnly
            variant="secondary"
            srText="Toggle dark mode"
            @click="toggleTheme"
        >
            <x-heroicon-o-moon
                x-show="!isDarkMode"
                aria-hidden="true"
                class="h-6 w-6"
            />
            <x-heroicon-o-sun
                x-show="isDarkMode"
                aria-hidden="true"
                class="h-6 w-6"
            />
        </x-button>
        <x-dropdown
            align="right"
            width="48"
        >
            <x-slot name="trigger">
                <button
                    class="flex items-center p-2 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:text-gray-400 dark:hover:text-gray-200 dark:focus:ring-offset-dark-eval-1"
                >
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg
                            class="h-4 w-4 fill-current"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <!-- Logout si settings buttons-->
                <form
                    method="POST"
                    action="{{ route('settings') }}"
                >
                    @csrf
                    <x-dropdown-link
                        :href="route('settings')"
                        onclick="event.preventDefault();
                            this.closest('form').submit();"
                    >
                        {{ __('Settings') }}
                    </x-dropdown-link>

                </form>
                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >
                    @csrf
                    <x-dropdown-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                            this.closest('form').submit();"
                    >
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>

<!-- Mobile bottom bar --face nav barul din stanga sa se ascunda in stanga-->
<div
    class="fixed inset-x-0 bottom-0 flex items-center justify-between bg-white px-4 py-4 transition-transform duration-500 dark:bg-dark-eval-1 sm:px-6 md:hidden"
    :class="{
        'translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }"
>
    <x-button
        type="button"
        iconOnly
        variant="secondary"
        srText="Search"
    >
        <x-heroicon-o-search
            aria-hidden="true"
            class="h-6 w-6"
        />
    </x-button>

    <a
        href="{{ route('dashboard') }}"
        class="inline-flex items-center gap-2"
    >
        <x-application-logo class="w-20" />
    </a>

    <x-button
        type="button"
        iconOnly
        variant="secondary"
        srText="Open main menu"
        @click="isSidebarOpen = !isSidebarOpen"
    >
        <x-heroicon-o-menu
            x-show="!isSidebarOpen"
            aria-hidden="true"
            class="h-6 w-6"
        />
        <x-heroicon-o-x
            x-show="isSidebarOpen"
            aria-hidden="true"
            class="h-6 w-6"
        />
    </x-button>
</div>
