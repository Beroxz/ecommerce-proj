<x-app-layout>
    <form action="{{ route('password.email') }}" method="post"
        class="max-w-md mx-auto p-6 my-16 bg-white shadow-md rounded-lg">
        @csrf

        <h2 class="text-gray-700 text-2xl font-semibold text-center mb-5">
            Please Enter Your Email to Reset Your Password
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <p class="text-center text-gray-500 mb-6">
            or
            <a href="{{ route('login') }}" class="text-indigo-700 hover:text-indigo-600">
                remember your password?
            </a>
        </p>

        <div class="mb-4">
            <x-input id="email" class="block mt-1 w-full h-12" type="email" name="email" :value="old('email')"
                required autofocus placeholder="Enter Your Email Address" />
        </div>

        <button class="btn-primary hover:btn-primary active:btn-primary w-full h-12">
            Send Password Reset Link
        </button>
    </form>
</x-app-layout>
