{{-- @props(['categoryList'])

<div {{ $attributes->merge(['class' => 'category-list flex text-white bg-slate-700']) }}>
    @if (!empty($categoryList))
        @foreach ($categoryList as $category)
            <div class="category-item relative">
                <a href="{{ route('byCategory', $category) }}" class="cursor-pointer block py-3 px-6 hover:bg-black/10">
                    {{$category->name}}
                </a>
                <x-category-list class="absolute left-0 top-[100%] z-50 hidden flex-col" :category-list="$category->children"/>
            </div>
        @endforeach
    @endif
</div> --}}

@props(['categoryList'])

<div {{ $attributes->merge(['class' => 'category-select']) }}>
    @if (!empty($categoryList))
        <select id="categories"
            class="border-gray-300 focus:border-indigo-400 focus:outline-none focus:ring-indigo-500 rounded-md w-full">
            <option value="{{ route('byAllCategories') }}"
                {{ session('selectedCategory') === route('byAllCategories') ? 'selected' : '' }}>
                Select all category
            </option>
            @foreach ($categoryList as $category)
                <option value="{{ route('byCategory', $category) }}"
                    {{ session('selectedCategory') === route('byCategory', $category) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    @endif
</div>

<script>
    const categoriesSelect = document.getElementById('categories');
    const selectedCategory = localStorage.getItem('selectedCategory');
    if (selectedCategory) {
        categoriesSelect.value = selectedCategory;
    }

    categoriesSelect.addEventListener('change', function() {
        localStorage.setItem('selectedCategory', this.value);
        window.location.href = this.value;
    });
</script>
