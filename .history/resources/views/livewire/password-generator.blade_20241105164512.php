<div>
    <button wire:click="generatePassword" class="btn btn-primary">Generate Password</button>

    @if($password)
        <div class="mt-3">
            <strong>Generated Password:</strong>
            <span>{{ $password }}</span>
        </div>
    @endif
</div>
