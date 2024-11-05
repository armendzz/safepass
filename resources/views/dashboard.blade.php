<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-wrap p-6 justify-center gap-4 bg-white w-4/5 mx-auto">
            <livewire:save-password />
            <livewire:show-saved-passwords />
        </div>

        <div class="flex flex-wrap p-6 justify-center gap-4">
            <livewire:password-generator />
            <livewire:uuid-generator />
            <livewire:cloak-key-generator />
        </div>
    </div>
</x-app-layout>
