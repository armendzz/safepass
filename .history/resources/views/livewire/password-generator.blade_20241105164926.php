<div>
    <div>
        <label>
            <input type="checkbox" wire:model="includeLowercase"> Include Lowercase
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" wire:model="includeUppercase"> Include Uppercase
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" wire:model="includeNumbers"> Include Numbers
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" wire:model="includeChars"> Include Special Characters
        </label>
    </div>
    <div>
        <label>
            Password Length:
            <input type="number" wire:model="length" value="12">
        </label>
    </div>
    <button wire:click="generatePassword" class="btn btn-primary">Generate Password</button>

    @if($password)
        <div class="mt-3">
            <strong>Generated Password:</strong>
            <span>{{ $password }}</span>
        </div>
    @endif
</div>
