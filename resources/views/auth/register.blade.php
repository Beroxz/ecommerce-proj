<x-app-layout>
    <form action="{{ route('register') }}" method="post" class="max-w-md mx-auto p-6 my-16 bg-white shadow-md rounded-lg">
        @csrf

        <h2 class="text-gray-700 text-4xl font-semibold text-center mb-5">Create an Account</h2>
        <p class="text-center text-gray-500 mb-6">
            Enter your details below, or
            <a href="{{ route('login') }}" class="text-sm text-indigo-700 hover:text-indigo-600">
                already have an account? Log in.
            </a>
        </p>

        @if (session('error'))
            <div class="py-2 px-3 bg-red-500 text-white mb-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="mb-4">
            <x-input placeholder="Name" type="text" name="name" class="h-12 w-full" :value="old('name')" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Email" type="email" name="email" class="h-12 w-full" :value="old('email')" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Password" type="password" name="password" class="h-12 w-full" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Confirm Password" type="password" name="password_confirmation" class="h-12 w-full" />
        </div>

        <button class="btn-primary hover:btn-primary active:btn-primary w-full">
            Register
        </button>
    </form>
</x-app-layout>
