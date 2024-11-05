<?php
namespace App\Livewire;

use App\Models\Passwords; // Keep the plural form as per your naming
use App\Models\User; // Import the User model
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
            // Create the password entry
            $passwordEntry = Passwords::create([
                'id' => (string) Str::uuid(),
                'created_by' => Auth::id(),
                'encrypted_password' => encrypt($this->password),
                'description' => $this->description,
                'type' => $this->type, // Store type
            ]);

            $passwordEntry->users()->attach(Auth::id());
            // Handle shared emails if provided
            if ($this->sharedEmails) {
                $emails = array_map('trim', explode(',', $this->sharedEmails));

                // Find users by email and attach to the password
                foreach ($emails as $email) {
                    $user = User::where('email', $email)->first(); // Find user by email

                    if ($user) {
                        // Attach the password to the user in the pivot table
                        $passwordEntry->users()->attach($user->id);
                    } else {
                        session()->flash('error', "User with email $email does not exist.");
                    }
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
