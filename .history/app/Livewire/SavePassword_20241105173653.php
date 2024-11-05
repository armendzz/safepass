<?php
namespace App\Livewire;

use App\Models\Passwords; // Updated to singular form
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

        try {
            Passwords::create([ // Use singular form
                'id' => (string) Str::uuid(),
                'created_by' => Auth::id(), // Updated to match your schema
                'encrypted_password' => encrypt($this->password), // Fixed typo
                'description' => $this->description,
            ]);

            // Optionally reset the fields
            $this->password = '';
            $this->description = '';

            session()->flash('message', 'Password saved successfully!');
        } catch (\Exception $e) {
            // Handle the exception, log it, or display an error message
            session()->flash('error', 'Failed to save password: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.save-password');
    }
}

