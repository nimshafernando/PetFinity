<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <style>
            .auth-card {
                background-color: #f0f4f8;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 2rem;
                max-width: 500px;
                margin: auto;
            }

            .auth-card .block {
                margin-bottom: 1rem;
            }

            .auth-card .block label {
                font-weight: bold;
                color: #333;
            }

            .auth-card .block input {
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 0.5rem;
                width: 100%;
            }

            .auth-card .block input:focus {
                border-color: #4c51bf;
                outline: none;
                box-shadow: 0 0 0 1px #4c51bf;
            }

            .auth-card .flex {
                display: flex;
                justify-content: flex-end;
            }

            .auth-card .flex button {
                background-color: #4c51bf;
                color: #fff;
                padding: 0.75rem 1.5rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            .auth-card .flex button:hover {
                background-color: #3b40c0;
            }

            @media (max-width: 500px) {
                .auth-card {
                    padding: 1rem;
                }
            }
        </style>

        <div class="auth-card">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4 block">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4 block">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
