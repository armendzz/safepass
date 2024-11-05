<div class="w-3/12 p-6 bg-white rounded-lg shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Save Password</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-4">
        <label class="block">
            <span class="text-gray-700">Password:</span>
            <input type="text" wire:model="password" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </label>
    </div>

    <div class="mb-4">
        <label class="block">
            <span class="text-gray-700">Description:</span>
            <textarea wire:model="description" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="3" placeholder="Optional description..."></textarea>
        </label>
    </div>

    <button wire:click="savePassword" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Save Password</button>
</div>
