<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Heading -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Login
        </h2>

        <p class="text-gray-500 mt-2">
            Enter your credentials to continue
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    Remember Me
                </span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif

            <x-primary-button class="bg-blue-700 hover:bg-blue-800 px-6 py-3 rounded-lg">
                Log in
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>