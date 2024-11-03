<x-app-layout>
    <div class="container mx-auto my-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Submit Your Review</h2>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="rating" value="{{ $rating }}">

            <div class="mb-4">
                <label for="comment" class="block text-gray-700 font-bold mb-2">Comment</label>
                <textarea name="comment" id="comment" rows="5" required class="w-full border border-gray-300 rounded p-2"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn-primary py-2 px-4 rounded-lg text-white">Submit Review</button>
            </div>
        </form>
    </div>
</x-app-layout>
