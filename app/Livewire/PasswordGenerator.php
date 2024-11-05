<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordGenerator extends Component
{
    public $password;
    public $length = 12;
    public $includeLowercase = true;
    public $includeUppercase = true;
    public $includeNumbers = true;
    public $includeChars = true;

    public function generatePassword()
    {
        $this->password = $this->generateRandomPassword(
            $this->length,
            $this->includeLowercase,
            $this->includeUppercase,
            $this->includeNumbers,
            $this->includeChars
        );
    }

    private function generateRandomPassword($length, $includeLowercase, $includeUppercase, $includeNumbers, $includeChars)
    {
        $characters = '';
        if ($includeLowercase) {
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($includeUppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($includeNumbers) {
            $characters .= '0123456789';
        }
        if ($includeChars) {
            $characters .= '!@#$%^&*()';
        }

        if (empty($characters)) {
            return '';
        }

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
