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
    public $sharedEmails; // New property for sharing emails
    public $type = 'password'; // Default type

    protected $rules = [
        'password' => 'required|string',
        'description' => 'nullable|string|max:255',
        'sharedEmails' => 'nullable|string', // Validate emails
        'type' => 'required|string|in:password,uuid,cloak_key', // Validate type
    ];

    public function savePassword()
    {
        $this->validate();

        try {
            $passwordEntry = Passwords::create([
                'id' => (string) Str::uuid(),
                'created_by' => Auth::id(),
                'encrypted_password' => encrypt($this->password),
                'description' => $this->description,
                'type' => $this->type, // Store type
            ]);

            // Handle shared emails if provided
            if ($this->sharedEmails) {
                $emails = array_map('trim', explode(',', $this->sharedEmails));
                foreach ($emails as $email) {
                    // Implement logic to associate the password with the users via email
                    // You might need to validate and find the user by email here
                }
            }

            // Optionally reset the fields
            $this->password = '';
            $this->description = '';
            $this->sharedEmails = '';
            $this->type = 'password'; // Reset to default

            session()->flash('message', 'Password saved successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save password: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.save-password');
    }
}
