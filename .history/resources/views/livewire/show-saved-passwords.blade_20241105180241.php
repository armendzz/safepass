<div class="w-5/12 p-6 bg-white rounded-lg shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Last 5 Saved Passwords</h2>

    @if($savedPasswords->isEmpty())
        <p class="text-gray-700">No saved passwords found.</p>
    @else
        <ul class="space-y-4">
            @foreach($savedPasswords as $savedPassword)
                <li class="p-4 bg-gray-100 rounded-lg ">
                    <div>
                        <span class="font-mono">{{ decrypt($savedPassword->encrypted_password) }}</span>
                        <span class="text-gray-500 text-sm">{{ $savedPassword->description }}</span>

                        <div>
                            <button
                            onclick="copyToClipboard('{{ decrypt($savedPassword->encrypted_password) }}')"
                                class="ml-4 px-2 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300"
                                title="Copy to clipboard"
                            >
                                Copy
                            </button>
                            <button
                            onclick="if(!confirm('Are you sure you want to delete this password?')) return false;"
                            wire:click="deletePassword('{{ $savedPassword->id }}')"
                            class="ml-4 px-2 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300"
                            title="Delete password"

                        >
                            Delete
                        </button>
                        </div>
                    </div>
                    @if ($savedPassword->created_by != Auth::id())
                    <span class="text-gray-500 text-sm">This is shared with you</span>
                    @endif

                </li>
            @endforeach
        </ul>
    @endif

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
        }
    </script>
</div>
