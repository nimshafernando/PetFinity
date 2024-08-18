<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <style>
            .auth-card {
                background-color: #f0f4f8;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 2rem;
                max-width: 500px;
                margin: auto;
                text-align: center;
            }

            .auth-card .text-sm {
                color: #4a5568;
                margin-bottom: 1rem;
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

            .auth-card .font-medium {
                color: #38a169;
            }

            @media (max-width: 500px) {
                .auth-card {
                    padding: 1rem;
                }
            }
        </style>

        <div class="auth-card">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
