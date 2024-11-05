<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Passwords; // Change to the singular form
use Illuminate\Support\Facades\Auth;

class ShowSavedPasswords extends Component
{
    public $savedPasswords;

    public function mount()
    {
        $this->savedPasswords = $this->fetchSavedPasswords();
    }

    public function fetchSavedPasswords()
    {
        return Password::whereHas('users', function ($query) {
            $query->where('users.id', Auth::id()); // Explicitly reference the users table
        })
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->with('creator') // Eager load the creator
        ->get();
    }


    public function render()
    {
        return view('livewire.show-saved-passwords', [
            'savedPasswords' => $this->savedPasswords // Pass data to the view
        ]);
    }
}
