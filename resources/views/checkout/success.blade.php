<x-app-layout>
    <div class="w-[400px] mx-auto bg-emerald-500 py-2 px-3 text-white rounded">
        {{ $customer->name }}, Your order has been completed!!
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ route('order.index') }}";
        }, 1500);
    </script>
</x-app-layout>
