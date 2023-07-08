<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Children;
use App\Models\Call;

class CallComponet extends Component
{   public $child;
    public $contacts;
    public $call;
    public $ids=0;
    public $children;

    public function render()
    {
        return view('livewire.call-componet');
    }

    public function mount($child)
    {
        $this->child = $child;
        $this->store();

    }

    public function store(){
        $this->children=Children::where('id',$this->child)->first();

        $this->call = Call::join('contacts', 'calls.contact_id', '=', 'contacts.id')
    ->where('contacts.children_id', $this->child)
    ->get(['calls.*']);

    }
}
