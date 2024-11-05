<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordGenerator extends Component
{
    public $password;

    public function generatePassword()
    {
        $this->password = $this->generateRandomPassword();
    }

    private function generateRandomPassword($length = 12)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function render()
    {
        return view('livewire.password-generator');
    }
}
