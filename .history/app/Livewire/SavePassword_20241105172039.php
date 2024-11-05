<?php

namespace App\Livewire;

use App\Models\Passwords;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SavePassword extends Component
{

    public $password;
    public $description;

    protected $rules = [
        'password' => 'required|string',
        'description' => 'nullable|string|max:255',
    ];

    public function savePassword()
    {
        $this->validate();

        Passwords::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'user_id' => Auth::id(),
            'encryped_password' => encrypt($this->password),
            'description' => $this->description,
        ]);

        // Optionally reset the fields
        $this->password = '';
        $this->description = '';

        session()->flash('message', 'Password saved successfully!');
    }

    public function render()
    {
        return view('livewire.save-password');
    }
}
