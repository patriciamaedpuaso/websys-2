<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        inline-flex items-center px-4 py-2
        bg-[#cdf71e] text-[#212121]
        border border-transparent
        rounded-md font-semibold text-xs uppercase tracking-widest
        hover:bg-[#a8bc52]
        focus:outline-none focus:ring-2 focus:ring-[#cdf71e] focus:ring-offset-2
        transition ease-in-out duration-150
    ']) }}>
    {{ $slot }}
</button>
