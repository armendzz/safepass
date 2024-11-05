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
        return Passwords::whereHas('users', function ($query) {
            $query->where('id', Auth::id());
        })
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->with('creator') // Corrected to use 'creator'
        ->get();
    }

    public function render()
    {
        return view('livewire.show-saved-passwords', [
            'savedPasswords' => $this->savedPasswords // Pass data to the view
        ]);
    }
}
