@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#cdf71e] text-start text-base font-medium text-[#212121] bg-[#e6f8a1] focus:outline-none focus:text-[#212121] focus:bg-[#d4f15f] focus:border-[#a8bc52] transition duration-150 ease-in-out'
    : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#73706d] hover:text-[#a8bc52] hover:bg-[#f0f7d9] hover:border-[#a8bc52] focus:outline-none focus:text-[#a8bc52] focus:bg-[#f0f7d9] focus:border-[#a8bc52] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
