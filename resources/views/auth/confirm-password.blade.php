<x-guest-layout>
    <x-logo.authentication-card>
        <x-slot name="logo">
            <x-logo.authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-elements.validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-elements.label for="password" value="{{ __('Password') }}" />
                <x-elements.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-elements.button class="ms-4">
                    {{ __('Confirm') }}
                </x-elements.button>
            </div>
        </form>
    </x-logo.authentication-card>
</x-guest-layout>
