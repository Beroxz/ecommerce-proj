<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary hover:btn-primaryactive:btn-primary w-full']) }}>
    {{ $slot }}
</button>

{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary hover:bg-emerald-600 active:bg-emerald-700 w-full']) }}>
    {{ $slot }}
</button> --}}
