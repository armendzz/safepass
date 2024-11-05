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

        <div class="ontainer m-auto grid grid-cols-3">
            <livewire:password-generator />
            <livewire:uuid-generator />
        </div>
    </div>
</x-guest-layout>
