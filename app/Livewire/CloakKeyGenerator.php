<?php

namespace App\Livewire;

use Livewire\Component;

class CloakKeyGenerator extends Component
{

    public $cloakKey;
    public $length = 32; // Default length for the cloak key

    public function generateCloakKey()
    {
        $this->cloakKey = $this->generateRandomCloakKey($this->length);
    }

    private function generateRandomCloakKey($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+[]{}|;:,.<>?';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function render()
    {
        return view('livewire.cloak-key-generator');
    }
}
