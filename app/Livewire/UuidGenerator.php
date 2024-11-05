<?php

namespace App\Livewire;

use Livewire\Component;

class UuidGenerator extends Component
{
    public $uuid;

    public function generateUuid()
    {
        $this->uuid = (string) \Illuminate\Support\Str::uuid();
    }

    public function render()
    {
        return view('livewire.uuid-generator');
    }
}
