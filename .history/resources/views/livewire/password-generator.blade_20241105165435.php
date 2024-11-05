<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Password Generator</h2>

    <div class="mb-4">
        <label class="flex items-center">
            <input type="checkbox" wire:model="includeLowercase" class="form-checkbox text-blue-600">
            <span class="ml-2">Include Lowercase</span>
        </label>
    </div>
    <div class="mb-4">
        <label class="flex items-center">
            <input type="checkbox" wire:model="includeUppercase" class="form-checkbox text-blue-600">
            <span class="ml-2">Include Uppercase</span>
        </label>
    </div>
    <div class="mb-4">
        <label class="flex items-center">
            <input type="checkbox" wire:model="includeNumbers" class="form-checkbox text-blue-600">
            <span class="ml-2">Include Numbers</span>
        </label>
    </div>
    <div class="mb-4">
        <label class="flex items-center">
            <input type="checkbox" wire:model="includeChars" class="form-checkbox text-blue-600">
            <span class="ml-2">Include Special Characters</span>
        </label>
    </div>
    <div class="mb-4">
        <label class="block">
            <span class="text-gray-700">Password Length:</span>
            <input type="number" wire:model="length" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="12">
        </label>
    </div>
    <button wire:click="generatePassword" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Generate Password</button>

    @if($password)
        <div class="mt-4 p-4 bg-black text-white rounded-lg flex items-center justify-between">
            <span class="block text-lg font-mono">{{ $password }}</span>
            <button onclick="copyToClipboard('{{ $password }}')" class="ml-4 py-2 px-4 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75">Copy</button>
        </div>
    @endif
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Password copied to clipboard');
        }, function(err) {
            alert('Failed to copy password');
        });
    }
</script>
