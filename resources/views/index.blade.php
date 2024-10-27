<x-app-layout>
    <!-- Hero Section -->
    <section class="hero bg-gray py-1 px-6">
        <div class="container mx-auto flex flex-col-reverse lg:flex-row items-center">
            <div class="hero-content lg:w-1/2 text-center lg:text-left">
                <h1 class="text-4xl font-bold mb-4">
                    <span class="highlight-black">Bring </span>
                    <span class="text-green-primary">Nature </span>
                    <span class="highlight-black">to </span>
                    <span class="highlight-black">Your </span>
                    <span class="text-green-primary">Home </span>
                </h1>
                <p class="text-2xl mb-6">
                    Discover our curated collection of plants, perfect for any space.
                    Brighten your day and purify your air with the beauty of nature.
                </p>
                <a href="{{ route('shop') }}" class="btn-primary">Shop Now</a>
            </div>
            <div class="hero-section lg:w-1/2">
                <img src="{{ asset('/storage/imgfront/hero-image.png') }}" alt="Hero image"
                    class="w-full lg:w-3/4 mx-auto" />
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Explore Plant Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- @foreach ($categories as $category)
                    <div class="category-item bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
                        <p class="text-gray-600">{{ $category->description }}</p>
                        <a href="{{ route('category.show', $category->slug) }}" class="text-green-600 mt-4 inline-block">Shop {{ $category->name }}</a>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products py-16 bg-gray">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg">
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold">฿{{ number_format($product->price, 2) }}</p>

                        {{-- <div class="flex items-center mt-2">
                            @php
                                $rating = $product->rating;
                                $starCount = 5;
                            @endphp

                            @for ($i = 1; $i <= $starCount; $i++)
                                <span class="text-yellow-500">
                                    @if ($i <= $rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                </span>
                            @endfor

                            <span class="ml-2 text-gray-600">({{ $rating }})</span> <!-- แสดงคะแนน -->
                        </div> --}}

                        <button onclick="location.href='{{ route('product.view', $product->slug) }}'"
                            class="btn-primary hover:btn-primary text-white py-2 px-4 rounded mt-4 w-full">
                            View
                        </button>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Plant Care Tips Section -->
    <section class="plant-care-tips py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Plant Care Tips</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- @foreach ($plantCareTips as $tip)
                    <div class="tip-item bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">{{ $tip->title }}</h3>
                        <p class="text-gray-600">{{ $tip->description }}</p>
                        <a href="{{ route('tips.show', $tip->slug) }}" class="text-green-600 mt-4 inline-block">Learn More</a>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>
</x-app-layout>
