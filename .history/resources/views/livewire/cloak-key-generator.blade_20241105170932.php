<div class="max-w-md p-6 bg-white rounded-lg shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Cloak Key Generator</h2>

    <div class="mb-4">
        <label class="block">
            <span class="text-gray-700">Key Length:</span>
            <input type="number" wire:model="length" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="32">
        </label>
    </div>

    <button wire:click="generateCloakKey" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Generate Cloak Key</button>

    @if($cloakKey)
        <div class="mt-4 p-4 bg-black text-white rounded-lg flex items-center justify-between">
            <span class="block text-lg font-mono">{{ $cloakKey }}</span>
            <button onclick="copyToClipboard('{{ $cloakKey }}')" class="ml-4 py-2 px-4 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Copy</button>
        </div>
    @endif
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
    }
</script>
