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
            $query->where('users.id', Auth::id()); // Explicitly reference the users table
        })
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->with('creator') // Eager load the creator
        ->get();
    }

    public function copyToClipboard($password)
{
    // Use JavaScript to copy to clipboard
    $this->dispatchBrowserEvent('copyToClipboard', ['password' => $password]);
}


public function deletePassword($passwordId)
{
    try {
        $password = Passwords::findOrFail($passwordId);
        $password->users()->detach(); // Detach all users associated with this password
        $password->delete(); // Delete the password entry

        session()->flash('message', 'Password deleted successfully!');
    } catch (\Exception $e) {
        session()->flash('error', 'Failed to delete password: ' . $e->getMessage());
    }

    // Refresh the saved passwords after deletion
    $this->savedPasswords = $this->fetchSavedPasswords();
}

    public function render()
    {
        return view('livewire.show-saved-passwords', [
            'savedPasswords' => $this->savedPasswords // Pass data to the view
        ]);
    }
}
