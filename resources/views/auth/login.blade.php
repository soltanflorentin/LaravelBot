<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <!-- Validation Errors -->
        <x-auth-validation-errors
            class="mb-4"
            :errors="$errors"
        />

        <form
            method="POST"
            action="{{ route('login') }}"
        >
            @csrf
            <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-label
                        for="email"
                        :value="__('Email')"
                    />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail
                                aria-hidden="true"
                                class="h-5 w-5"
                            />
                        </x-slot>
                        <x-input
                            withicon
                            id="email"
                            class="block w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            placeholder="{{ __('Email') }}"
                            required
                            autofocus
                        />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-label
                        for="password"
                        :value="__('Password')"
                    />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed
                                aria-hidden="true"
                                class="h-5 w-5"
                            />
                        </x-slot>
                        <x-input
                            withicon
                            id="password"
                            class="block w-full"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="{{ __('Password') }}"
                        />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label
                        for="remember_me"
                        class="inline-flex items-center"
                    >
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-purple-500 focus:border-purple-300 focus:ring focus:ring-purple-500 dark:border-gray-600 dark:bg-dark-eval-1 dark:focus:ring-offset-dark-eval-1"
                            name="remember"
                        >
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a
                            class="text-sm text-blue-500 hover:underline"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <x-button class="w-full justify-center gap-2">
                        <x-heroicon-o-login
                            class="h-6 w-6"
                            aria-hidden="true"
                        />
                        <span>{{ __('Log in') }}</span>
                    </x-button>
                </div>

                @if (Route::has('register'))
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Don’t have an account?') }}
                        <a
                            href="{{ route('register') }}"
                            class="text-blue-500 hover:underline"
                        >
                            {{ __('Register') }}
                        </a>
                    </p>
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
