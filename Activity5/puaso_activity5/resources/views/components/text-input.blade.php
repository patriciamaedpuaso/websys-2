@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'bg-[#ffffff] text-[#eaeae9] border-[#73706d] focus:border-[#cdf71e] focus:ring-[#cdf71e] rounded-md shadow-sm placeholder-gray-400'
    ]) }}
>
