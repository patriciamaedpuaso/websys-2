<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#212121] leading-tight border-b-4 border-[#cdf71e] pb-2">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#eaeae9] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#ffffffcc] overflow-hidden shadow-md sm:rounded-lg border border-[#a8bc52]">
                <div class="p-6 text-[#212121] font-medium text-lg">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
