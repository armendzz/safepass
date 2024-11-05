<div class="w-2/5 mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-4">UUID Generator</h2>

    <button wire:click="generateUuid" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Generate UUID</button>

    @if($uuid)
        <div class="mt-4 p-4 bg-black text-white rounded-lg flex items-center justify-between">
            <span class="block text-lg font-mono">{{ $uuid }}</span>
            <button onclick="copyToClipboard('{{ $uuid }}')" class="ml-4 py-2 px-4 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Copy</button>
        </div>
    @endif
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('UUID copied to clipboard');
        }, function(err) {
            alert('Failed to copy UUID');
        });
    }
</script>
