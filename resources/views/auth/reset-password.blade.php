<x-guest-layout>
    <x-logo.authentication-card>
        <x-slot name="logo">
            <x-logo.authentication-card-logo />
        </x-slot>

        <x-elements.validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-elements.label for="email" value="{{ __('Email') }}" />
                <x-elements.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-elements.label for="password" value="{{ __('Password') }}" />
                <x-elements.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-elements.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-elements.input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-elements.button>
                    {{ __('Reset Password') }}
                </x-elements.button>
            </div>
        </form>
    </x-logo.authentication-card>
</x-guest-layout>
