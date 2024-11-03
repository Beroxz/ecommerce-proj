<x-app-layout>
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-gray-700 text-3xl font-bold">Delivery Details</h1>
        <nav class="mt-2">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-500">Home</a>
            <span class="text-gray-700">/</span>
            <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-indigo-500">Shopping Cart</a>
            <span class="text-gray-700">/</span>
            <span class="text-gray-700">Delivery</span>
        </nav>
    </div>
    <div class="container mx-auto my-10 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Your Order Details Panel -->
            <div class="w-full bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Your Order Details</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-gray-600 font-medium">Product</th>
                                <th class="px-4 py-2 text-gray-600 font-medium text-center">Quantity</th>
                                <th class="px-4 py-2 text-gray-600 font-medium text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                @php
                                    // Calculate the total for each product
                                    $quantity = $orderItems[$product->id]['quantity'];
                                    $total = $product->price * $quantity;
                                @endphp
                                <tr class="border-b">
                                    <td class="px-4 py-2 flex items-center">
                                        <!-- Image Container -->
                                        <div class="w-36 h-32 flex items-center justify-center overflow-hidden">
                                            <img src="{{ $product->image }}" class="object-cover h-full" alt="">
                                        </div>
                                        <span class="ml-4">{{ $product->title }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-center">{{ $quantity }}</td>
                                    <td class="px-4 py-2 text-right">{{ number_format($total, 2) }} baht</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-100">
                            <tr>
                                <td class="px-4 py-2 font-semibold">Totals</td>
                                <td class="px-4 py-2 text-center font-semibold"></td>
                                <td class="px-4 py-2 font-semibold text-right">{{ number_format($totalAmount, 2) }} baht
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Submit Button -->
                <form action="{{ route('cart.delivered') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="w-full btn-primary text-white font-semibold py-2 rounded-lg shadow transition">
                        Confirm Order for Delivery
                    </button>
                </form>
                <a href="{{ route('cart.index') }}" class="inline-block mt-4 text-indigo-600 hover:underline">
                    Back to Shopping Cart
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
