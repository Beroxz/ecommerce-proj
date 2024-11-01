<x-app-layout>
    <!-- Header Section -->
    <div class="container mx-auto mt-4 mb-6">
        <h1 class="text-gray-700 text-2xl font-bold">Product Details</h1>
        <div class="mt-2">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-500">Home</a>
            <span class="text-gray-700">/</span>
            <span class="text-gray-700">{{ $product->title }}</span>
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
            <div class="lg:col-span-3">
                <div x-data="{
                    images: {{ $product->images->count() ? $product->images->map(fn($im) => $im->url) : json_encode(['/img/noimage.png']) }},
                    activeImage: null,
                    prev() {
                        let index = this.images.indexOf(this.activeImage);
                        if (index === 0)
                            index = this.images.length;
                        this.activeImage = this.images[index - 1];
                    },
                    next() {
                        let index = this.images.indexOf(this.activeImage);
                        if (index === this.images.length - 1)
                            index = -1;
                        this.activeImage = this.images[index + 1];
                    },
                    init() {
                        this.activeImage = this.images.length > 0 ? this.images[0] : null
                    }
                }">
                    <div class="relative">
                        <template x-for="image in images">
                            <div x-show="activeImage === image"
                                class="w-full h-[240px] sm:h-[400px] flex items-center justify-center">
                                <img :src="image" alt="" class="w-auto h-auto max-h-full mx-auto" />
                            </div>
                        </template>
                        <a @click.prevent="prev"
                            class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a @click.prevent="next"
                            class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex">
                        <template x-for="image in images">
                            <a @click.prevent="activeImage = image"
                                class="cursor-pointer w-[80px] h-[80px] border border-gray-300 hover:border-purple-500 flex items-center justify-center"
                                :class="{ 'border-purple-600': activeImage === image }">
                                <img :src="image" alt="" class="w-auto max-auto max-h-full" />
                            </a>
                        </template>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <h1 class="text-lg font-semibold">
                    {{ $product->title }}
                </h1>
                <div class="text-xl font-bold mb-6">฿{{ number_format($product->price, 2) }}</div>
                <div class="mb-4">
                    <span class="text-lg font-semibold">Store:</span>
                    <span class="text-gray-600">{{ $seller->store_name }}</span>
                </div>
                @if ($product->quantity === 0)
                    <div class="bg-red-400 text-white py-2 px-3 rounded mb-3">
                        The product is out of stock
                    </div>
                @endif
                <div class="flex items-center justify-between mb-5">
                    <label for="quantity" class="block font-bold mr-4">
                        Quantity
                    </label>
                    <input type="number" name="quantity" x-ref="quantityEl" value="1" min="1"
                        class="w-32 focus:border-purple-500 focus:outline-none rounded" />
                </div>
                <button :disabled="product.quantity === 0" @click="addToCart($refs.quantityEl.value)"
                    class="btn-primary py-4 text-lg flex justify-center min-w-0 w-full mb-6"
                    :class="product.quantity === 0 ? 'cursor-not-allowed' : 'cursor-pointer'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Add to Cart
                </button>
                <div class="mb-6" x-data="{ expanded: false }">
                    <div x-show="expanded" x-collapse.min.120px class="text-gray-500 wysiwyg-content">
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
            <h2 class="text-gray-700 text-xl font-bold mb-4">Customer Reviews</h2>
            <div class="space-y-6">
                <!-- Existing Reviews -->
                <template x-for="review in reviews" :key="review.id">
                    <div class="p-4 border border-gray-200 rounded shadow-sm">
                        <div class="flex items-center mb-2">
                            <div class="text-yellow-500 flex items-center mr-2">
                                <!-- Star Ratings -->
                                <template x-for="star in 5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        :class="{
                                            'text-yellow-500': review.rating >= star,
                                            'text-gray-300': review.rating <
                                                star
                                        }">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                </template>
                            </div>
                            <span class="text-gray-700 font-semibold" x-text="review.user_name"></span>
                            <span class="text-gray-500 text-sm ml-auto" x-text="review.created_at"></span>
                        </div>
                        <p class="text-gray-600" x-text="review.comment"></p>
                    </div>
                </template>

                <!-- Add a Review Form -->
                <div class="mt-6 p-4 border border-gray-200 rounded shadow-sm">
                    <h3 class="text-gray-700 text-lg font-semibold mb-3">Write a Review</h3>
                    <div class="flex items-center mb-3">
                        <label class="block text-gray-700 font-bold mr-4">Your Rating:</label>
                        <div class="flex">
                            <template x-for="star in 5">
                                <svg @click="setRating(star)" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2"
                                    :class="{ 'text-yellow-500': rating >= star, 'text-gray-300': rating < star }">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.207 6.79a1 1 0 00.95.69h7.127c.969 0 1.371 1.24.588 1.81l-5.783 4.21a1 1 0 00-.364 1.118l2.207 6.79c.3.921-.755 1.688-1.54 1.118l-5.783-4.21a1 1 0 00-1.176 0l-5.783 4.21c-.784.57-1.838-.197-1.54-1.118l2.207-6.79a1 1 0 00-.364-1.118L2.082 11.416c-.784-.57-.381-1.81.588-1.81h7.127a1 1 0 00.95-.69l2.207-6.79z" />
                                </svg>
                            </template>
                        </div>
                    </div>
                    <textarea x-ref="commentEl" class="w-full border rounded p-2 focus:outline-none focus:border-purple-500"
                        rows="4" placeholder="Write your review here..."></textarea>
                    <button @click="submitReview($refs.commentEl.value)" class="btn-primary py-2 mt-4 w-full">
                        Submit Review
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function productItem(data) {
        return {
            ...data,
            reviews: [{
                    id: 1,
                    user_name: 'John Doe',
                    rating: 5,
                    comment: 'Great product!',
                    created_at: '2024-10-28'
                },
                {
                    id: 2,
                    user_name: 'Jane Smith',
                    rating: 4,
                    comment: 'Good quality, but a bit pricey.',
                    created_at: '2024-10-25'
                }
            ],
            rating: 0,
            setRating(star) {
                this.rating = star;
            },
            submitReview(comment) {
                if (comment.trim() === '') {
                    alert('Please write a review before submitting.');
                    return;
                }

                // ตัวอย่างการเพิ่มข้อมูลรีวิวใหม่ลงในรายการ reviews
                this.reviews.push({
                    id: this.reviews.length + 1, // สร้าง ID ใหม่สำหรับรีวิว
                    user_name: 'Anonymous', // หรือใช้ข้อมูลผู้ใช้ที่เหมาะสม
                    rating: this.rating, // ใช้คะแนนที่ผู้ใช้ให้
                    comment: comment,
                    created_at: new Date().toISOString().split('T')[0] // วันที่ปัจจุบันในรูปแบบ YYYY-MM-DD
                });

                // รีเซ็ตค่า rating และ comment
                this.rating = 0;
                this.$refs.commentEl.value = '';
                alert('Thank you for your review!');
            }

        };
    }
</script>
