<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <h1 class="text-3xl font-bold text-center border-b">SAFE PASS</h1>
        </div>

        <div class="flex flex-wrap justify-center gap-4">
            <livewire:password-generator />
            <livewire:uuid-generator />
            <livewire:cloack-key-generator />
        </div>
    </div>
</x-guest-layout>
