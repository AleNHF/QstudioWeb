<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LocationComponet extends Component
{

    public $child;

    public function render()
    {
        return view('livewire.location-componet');
    }

    public function mount($child)
    {
        $this->child = $child;

    }
}
