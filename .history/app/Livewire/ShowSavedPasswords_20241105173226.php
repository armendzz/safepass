<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Passwords;
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
            $query->where('id', Auth::id());
        })
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->with('createdBy') // Eager load the creator
        ->get();
    }


    public function render()
    {
        return view('livewire.show-saved-passwords');
    }
}
