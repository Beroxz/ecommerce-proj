<x-app-layout>
    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto p-6 my-16">
        <h2 class="text-gray-700 text-4xl font-semibold text-center mb-5">
            Log in to Exclusive
        </h2>
        <p class="text-gray-500 text-center mb-6">
            Enter your details below, or
            <a href="{{ route('register') }}" class="text-sm text-indigo-700 hover:text-indigo-600">
                create a new account.
            </a>
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        @csrf
        <div class="mb-4">
            <x-input type="email" name="email" placeholder="Email address" class="h-12 w-full" :value="old('email')" />
        </div>
        <div class="mb-4">
            <x-input type="password" name="password" placeholder="Password" class="h-12 w-full" :value="old('password')" />
        </div>
        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center">
                <input id="loginRememberMe" type="checkbox"
                    class="mr-3 rounded border-gray-300 text-green-600 focus:ring-green-500" />
                <label for="loginRememberMe">Remember Me</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-indigo-700 hover:text-indigo-600">
                    Forgot Password?
                </a>
            @endif
        </div>
        <button class="btn-primary hover:btn-primary active:btn-primary w-full">
            Login
        </button>
    </form>
</x-app-layout>
