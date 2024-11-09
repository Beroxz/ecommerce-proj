<x-app-layout>
    <!-- Hero Section -->
    <section class="hero bg-gray py-3 px-6">
        <div class="container mx-auto flex flex-col-reverse lg:flex-row items-center">
            <div class="hero-content lg:w-1/2 text-center lg:text-left">
                <h1 class="text-4xl font-bold mb-4">
                    <span class="text-gray-800">Bring </span>
                    <span class="text-green-primary">Nature </span>
                    <span class="text-gray-800">to </span>
                    <span class="text-gray-800">Your </span>
                    <span class="text-green-primary">Home </span>
                </h1>
                <p class="text-2xl mb-12">
                    Discover our curated collection of plants, perfect for any space.
                    Brighten your day and purify your air with the beauty of nature.
                </p>
                <a href="{{ route('shop') }}" class="btn-primary" style="padding: 15px 20px;">Shop Now</a>
            </div>
            <div class="hero-section lg:w-1/2">
                <img src="{{ asset('/storage/imgfront/hero-image.png') }}" alt="Hero image"
                    class="w-full lg:w-3/4 mx-auto" />
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories py-12 bg-white rounded-xl">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Categories</h2>
            <div class="flex items-center justify-center gap-4 relative">
                <button
                    class="w-12 h-12 text-3xl bg-gray-200 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-300 transition-colors duration-200"
                    id="scroll-left">
                    <span>&#8249;</span>
                </button>

                <div id="category-container"
                    class="overflow-x-auto whitespace-nowrap scroll-smooth no-scrollbar overflow-hidden flex-1">
                    <div class="flex gap-4">
                        @foreach ($categories as $category)
                            <a href="{{ route('byCategory', $category->slug) }}"
                                class="category-item inline-block bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200 min-w-[200px]"
                                data-slug="{{ $category->slug }}">
                                <h3 class="text-lg text-gray-700 font-semibold">{{ $category->name }}</h3>
                            </a>
                        @endforeach
                    </div>
                </div>

                <button
                    class="w-12 h-12 text-3xl bg-gray-200 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-300 transition-colors duration-200"
                    id="scroll-right">
                    <span>&#8250;</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products py-12 bg-gray rounded-xl">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Featured Products</h2>

            <!-- Tabs -->
            <div class="tabs mb-6">
                <button class="text-gray-700 tab-button active" onclick="showTab('all')">All Products</button>
                <button class="text-gray-700 tab-button" onclick="showTab('bestseller')">Best Sellers</button>
                <button class="text-gray-700 tab-button" onclick="showTab('new')">New Arrivals</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" id="product-grid">
                <!-- All Products -->
                @foreach ($allProducts as $product)
                    <div x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image ?: '/assets/img/noimage.png',
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product),
                    ]) }})"
                        class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg relative">
                        @if ($product->is_promotion)
                            <span
                                class="absolute top-2 right-2 bg-red-600 text-white text-lg font-bold py-1 px-3 rounded rotate-12">
                                Hot
                            </span>
                        @endif
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold mt-2">฿{{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between items-center mb-2 mt-4">
                            <!-- Star Rating -->
                            <div class="flex gap-1">
                                @php
                                    $averageRating = $product->average_rating ?? 0;
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                @endphp

                                @for ($i = 0; $i < $fullStars; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24">
                                        <path
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766l-7.416 4.693L6 15.195.001 9.347l8.332-1.331L12 .587z" />
                                    </svg>
                                @endfor

                                @if ($halfStar)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24" transform="scale(-1, 1)">
                                        <path
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766v-18.18z" />
                                    </svg>
                                @endif

                                @for ($i = $fullStars + $halfStar; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766l-7.416 4.693L6 15.195.001 9.347l8.332-1.331L12 .587z" />
                                    </svg>
                                @endfor
                            </div>

                            <!-- Add to Cart Button -->
                            <button class="bg-transparent border-none cursor-pointer p-2 hover:text-green-700"
                                @click="addToCart()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden" id="best-seller-products">
                <!-- Best Selling Products -->
                @foreach ($bestSellProducts as $product)
                    <div x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image ?: '/assets/img/noimage.png',
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product),
                    ]) }})"
                        class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg relative">
                        @if ($product->is_promotion)
                            <span
                                class="absolute top-2 right-2 bg-red-600 text-white text-lg font-bold py-1 px-3 rounded rotate-12">
                                Hot
                            </span>
                        @endif
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold mt-2">฿{{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between items-center mb-2 mt-4">
                            <!-- Star Rating -->
                            <div class="flex gap-1">
                                @php
                                    $averageRating = $product->average_rating ?? 0;
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                @endphp

                                @for ($i = 0; $i < $fullStars; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24">
                                        <path
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766l-7.416 4.693L6 15.195.001 9.347l8.332-1.331L12 .587z" />
                                    </svg>
                                @endfor

                                @if ($halfStar)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24" transform="scale(-1, 1)">
                                        <path
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766v-18.18z" />
                                    </svg>
                                @endif

                                @for ($i = $fullStars + $halfStar; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766l-7.416 4.693L6 15.195.001 9.347l8.332-1.331L12 .587z" />
                                    </svg>
                                @endfor
                            </div>

                            <!-- Add to Cart Button -->
                            <button class="bg-transparent border-none cursor-pointer p-2 hover:text-green-700"
                                @click="addToCart()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden" id="new-products">
                <!-- New Products -->
                @foreach ($newProducts as $product)
                    <div x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image ?: '/assets/img/noimage.png',
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product),
                    ]) }})"
                        class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg relative">
                        @if ($product->is_promotion)
                            <span
                                class="absolute top-2 right-2 bg-red-600 text-white text-lg font-bold py-1 px-3 rounded rotate-12">
                                Hot
                            </span>
                        @endif
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold mt-2">฿{{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between items-center mb-2 mt-4">
                            <!-- Star Rating -->
                            <div class="flex gap-1">
                                @php
                                    $averageRating = $product->average_rating ?? 0;
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                @endphp

                                @for ($i = 0; $i < $fullStars; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24">
                                        <path
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766l-7.416 4.693L6 15.195.001 9.347l8.332-1.331L12 .587z" />
                                    </svg>
                                @endfor

                                @if ($halfStar)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24" transform="scale(-1, 1)">
                                        <path
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766v-18.18z" />
                                    </svg>
                                @endif

                                @for ($i = $fullStars + $halfStar; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 .587l3.668 7.429L24 9.347l-6 5.848 1.416 8.264L12 18.766l-7.416 4.693L6 15.195.001 9.347l8.332-1.331L12 .587z" />
                                    </svg>
                                @endfor
                            </div>

                            <!-- Add to Cart Button -->
                            <button class="bg-transparent border-none cursor-pointer p-2 hover:text-green-700"
                                @click="addToCart()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                {{ $allProducts->links() }}
            </div>
        </div>
    </section>

    <!-- Plant Care Tips Section -->
    <section class="plant-care-tips py-12 bg-white rounded-xl">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Plant Care Tips</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($tools as $tip)
                    <div class="tip-item bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
                        <img src="{{ $tip->image ?: asset('assets/img/noimage.png') }}" alt="{{ $tip->title }}"
                            class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-semibold mb-4">{{ $tip->title }}</h3>
                        <p class="text-gray-600">{{ $tip->description }}</p>
                        {{-- <a href="{{ route('tips.show', $tip->slug) }}" class="text-green-600 mt-4 inline-block">Learn More</a> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Plant Care Videos Section -->
    <section class="plant-care-videos py-12 bg-white rounded-xl">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Plant Care Videos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Video 1 -->
                <div class="video-item bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
                    <div class="video-wrapper mb-4">
                        <iframe class="w-full h-48 rounded" src="https://www.youtube.com/embed/J1LW1Nz0pd4"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">How to Care for Indoor Plants</h3>
                    <p class="text-gray-600">Learn the best tips to keep your indoor plants thriving.</p>
                </div>
                <!-- Video 2 -->
                <div class="video-item bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
                    <div class="video-wrapper mb-4">
                        <iframe class="w-full h-48 rounded" src="https://www.youtube.com/embed/-Dmvx20Y4YQ"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Watering Guide for Succulents</h3>
                    <p class="text-gray-600">Find out the proper way to water your succulents.</p>
                </div>
                <!-- Video 3 -->
                <div class="video-item bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
                    <div class="video-wrapper mb-4">
                        <iframe class="w-full h-48 rounded" src="https://www.youtube.com/embed/GoHvdDlbjvw"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Plant Pruning Techniques</h3>
                    <p class="text-gray-600">Master the art of pruning your plants for optimal growth.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Features Section -->
    <section class="features py-12 bg-white rounded-xl mt-10">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Our Features</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div class="feature-item flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-12 h-12 text-green-700 mb-4">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    <h3 class="text-gray-700 text-lg font-semibold">Delivery Service</h3>
                </div>

                <div class="feature-item flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-12 h-12 text-green-700 mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    <h3 class="text-gray-700 text-lg font-semibold">100% Money Back</h3>
                </div>

                <div class="feature-item flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-12 h-12 text-green-700 mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <h3 class="text-gray-700 text-lg font-semibold">Secure Payment</h3>
                </div>


                <div class="feature-item flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-12 h-12 text-green-700 mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <h3 class="text-gray-700 text-lg font-semibold">24 Hour Support</h3>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
    function showTab(tabName) {
        const allProducts = document.getElementById('product-grid');
        const newProducts = document.getElementById('new-products');
        const bestSellerProducts = document.getElementById('best-seller-products');

        allProducts.classList.add('hidden');
        newProducts.classList.add('hidden');
        bestSellerProducts.classList.add('hidden');

        if (tabName === 'all') {
            allProducts.classList.remove('hidden');
        } else if (tabName === 'new') {
            newProducts.classList.remove('hidden');
        } else if (tabName === 'bestseller') {
            bestSellerProducts.classList.remove('hidden');
        }

        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.classList.remove('active');
        });
        document.querySelector(`.tab-button[onclick="showTab('${tabName}')"]`).classList.add('active');
    }

    showTab('all');


    const categoryLinks = document.querySelectorAll('.category-item');
    const container = document.getElementById('category-container');
    document.getElementById('scroll-left').addEventListener('click', () => {
        container.scrollBy({
            left: -250,
            behavior: 'smooth'
        });
    });
    document.getElementById('scroll-right').addEventListener('click', () => {
        container.scrollBy({
            left: 250,
            behavior: 'smooth'
        });
    });
    categoryLinks.forEach(link => {
        link.addEventListener('click', function() {
            const slug = this.dataset.slug;
            const url = "{{ url('category') }}/" + slug;
            localStorage.setItem('selectedCategory', url);
        });
    });
</script>

{{-- fix style on page index --}}
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
