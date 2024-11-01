<x-app-layout>
    <!-- Header Section -->
    <div class="container mx-auto mt-6 mb-6">
        <h1 class="text-gray-800 text-3xl font-extrabold">Product Details</h1>
        <div class="mt-2">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600">Home</a>
            <span class="text-gray-600"> / </span>
            <span class="text-gray-600 font-medium">{{ $product->title }}</span>
        </div>
    </div>

    <div x-data="productItem({{ json_encode([
        'id' => $product->id,
        'slug' => $product->slug,
        'image' => $product->image ?: '/img/noimage.png',
        'title' => $product->title,
        'price' => $product->price,
        'quantity' => $product->quantity,
        'addToCartUrl' => route('cart.add', $product),
    ]) }})" class="container mx-auto">
        <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
            <div class="lg:col-span-3 bg-white shadow-lg rounded-lg overflow-hidden">
                <div x-data="{
                    images: {{ $product->images->count() ? $product->images->map(fn($im) => $im->url) : json_encode(['/img/noimage.png']) }},
                    activeImage: null,
                    prev() {
                        let index = this.images.indexOf(this.activeImage);
                        if (index === 0) index = this.images.length;
                        this.activeImage = this.images[index - 1];
                    },
                    next() {
                        let index = this.images.indexOf(this.activeImage);
                        if (index === this.images.length - 1) index = -1;
                        this.activeImage = this.images[index + 1];
                    },
                    init() {
                        this.activeImage = this.images.length > 0 ? this.images[0] : null
                    }
                }">
                    <div class="relative">
                        <template x-for="image in images">
                            <div x-show="activeImage === image"
                                class="w-full h-[300px] sm:h-[450px] flex items-center justify-center bg-gray-200">
                                <img :src="image" alt="" class="w-auto h-auto max-h-full mx-auto" />
                            </div>
                        </template>
                        <a @click.prevent="prev"
                            class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a @click.prevent="next"
                            class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 transform -translate-y-1/2 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex justify-center mt-2">
                        <template x-for="image in images">
                            <a @click.prevent="activeImage = image"
                                class="cursor-pointer w-[80px] h-[80px] border border-gray-300 hover:border-indigo-500 flex items-center justify-center rounded mx-1 transition duration-300 ease-in-out"
                                :class="{ 'border-indigo-600': activeImage === image }">
                                <img :src="image" alt="" class="w-auto max-auto max-h-full rounded" />
                            </a>
                        </template>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 bg-white shadow-lg rounded-lg p-6">
                <h1 class="text-xl font-semibold text-gray-800">{{ $product->title }}</h1>
                <div class="text-2xl font-bold text-gray-500 mb-4">฿{{ number_format($product->price, 2) }}</div>
                <div class="mb-4">
                    <span class="text-lg font-semibold">Store:</span>
                    <span class="text-gray-700">{{ $seller->store_name }}</span>
                </div>
                @if ($product->quantity === 0)
                    <div class="bg-red-500 text-white py-2 px-4 rounded mb-3 text-center">
                        The product is out of stock
                    </div>
                @endif
                <div class="flex items-center justify-between mb-5">
                    <label for="quantity" class="block font-bold text-gray-700">Quantity</label>
                    <input type="number" name="quantity" x-ref="quantityEl" value="1" min="1"
                        class="w-32 border border-gray-300 focus:border-indigo-500 focus:outline-none rounded" />
                </div>
                <button :disabled="product.quantity === 0" @click="addToCart($refs.quantityEl.value)"
                    class="btn-primary py-4 text-lg flex justify-center w-full mb-6"
                    :class="product.quantity === 0 ? 'bg-gray-400 cursor-not-allowed' : 'btn-primary'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Add to Cart
                </button>
                <div class="mb-6" x-data="{ expanded: false }">
                    <div x-show="expanded" x-collapse.min.120px class="text-gray-600 wysiwyg-content">
                        {!! $product->description !!}
                    </div>
                    <p class="text-right">
                        <a @click="expanded = !expanded" href="javascript:void(0)"
                            class="text-indigo-500 hover:text-indigo-700"
                            x-text="expanded ? 'Read Less' : 'Read More'"></a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Review Section -->
        <div class="container mx-auto mt-16">
            <h2 class="text-gray-800 text-xl font-bold mb-4">Reviews</h2>
            <div class="space-y-6">
                <div @if ($reviews->isEmpty()) class="text-gray-500" @endif>
                    @if ($reviews->isEmpty())
                        No reviews available
                    @else
                        @foreach ($reviews as $review)
                            <div class="p-4 border border-gray-300 rounded-lg shadow-sm"
                                style="background-color: rgba(255, 255, 255, 0.363);">
                                <div class="flex items-center mb-2">
                                    <span class="text-gray-600 font-semibold">{{ $review->customer->first_name }}</span>
                                    <span class="text-gray-500 text-sm ml-2">{{ $review->review_date }}</span>
                                    <div class="text-yellow-500 flex items-center ml-3">
                                        <!-- Star Ratings -->
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="{{ $review->rating >= $i ? 'text-yellow-500' : 'text-gray-300' }} h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.385a.563.563 0 0 0-.182-.557L3.01 10.062c-.38-.325-.178-.948.321-.988l5.518-.442a.563.563 0 0 0 .475-.345l2.125-5.111z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-700">{{ $review->comment }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
