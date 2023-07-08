<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactsComponet extends Component
{
    public $child;

    public function render()
    {
        return view('livewire.contacts-componet');
    }

    public function mount($child)
    {
        $this->child = $child;

    }
}
