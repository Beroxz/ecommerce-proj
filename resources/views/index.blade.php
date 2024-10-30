<x-app-layout>
    <!-- Hero Section -->
    <section class="hero bg-gray py-3 px-6">
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
    <section class="categories py-12 bg-white rounded-xl">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl text-gray-700 font-bold mb-8">Categories</h2>
            <div class="relative">
                <div id="category-container"
                    class="overflow-x-auto whitespace-nowrap scroll-smooth no-scrollbar mx-8 overflow-hidden">
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
            </div>
            <div class="flex justify-center mt-6 gap-12">
                <button class="text-4xl text-gray" id="scroll-left">
                    <span>&#8249;</span>
                </button>

                <button class="text-4xl text-gray" id="scroll-right">
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
                    <div class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg">
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold">฿{{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden" id="new-products">
                <!-- New Products -->
                @foreach ($newProducts as $product)
                    <div class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg">
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold">฿{{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden" id="best-seller-products">
                <!-- Best Selling Products -->
                @foreach ($bestSellProducts as $product)
                    <div class="product-item bg-white p-4 rounded-lg shadow hover:shadow-lg">
                        <a href="{{ route('product.view', $product->slug) }}">
                            <img src="{{ $product->image ?: asset('assets/img/noimage.png') }}"
                                alt="{{ $product->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        </a>

                        <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        <p class="text-green-700 font-bold">฿{{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
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
            left: -200,
            behavior: 'smooth'
        });
    });
    document.getElementById('scroll-right').addEventListener('click', () => {
        container.scrollBy({
            left: 200,
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
