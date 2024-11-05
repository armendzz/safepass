<div class="w-3/12 p-6 bg-white rounded-lg shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Last 5 Saved Passwords</h2>

    @if($savedPasswords->isEmpty())
        <p class="text-gray-700">No saved passwords found.</p>
    @else
        <ul class="space-y-4">
            @foreach($savedPasswords as $savedPassword)
                <li class="p-4 bg-gray-100 rounded-lg flex items-center justify-between">
                    <span class="font-mono">{{ decrypt($savedPassword->encryped_password) }}</span>
                    <span class="text-gray-500 text-sm">{{ $savedPassword->description }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
