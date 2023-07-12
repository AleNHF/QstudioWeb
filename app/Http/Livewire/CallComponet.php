<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Children;
use App\Models\Call;

class CallComponet extends Component
{
    public $child;
    public $contacts;
    public $call;
    public $ids = 0;
    public $children;
    public $fechaInicio;
    public $fechaFin;

    public function render()
    {
        return view('livewire.call-componet')->extends('layouts.app');
    }

    public function mount($child)
    {
        $this->child = $child;
        $this->children = Children::where('id', $this->child)->first();

        $this->call = Call::join('contacts', 'calls.contact_id', '=', 'contacts.id')
            ->where('contacts.children_id', $this->child)
            ->get(['calls.*']);

    }

    public function store()
    {
        $this->children = Children::where('id', $this->child)->first();

        $this->call = Call::join('contacts', 'calls.contact_id', '=', 'contacts.id')
            ->where('contacts.children_id', $this->child);
        
        if ($this->fechaInicio) {
            $this->call->whereDate('calls.date', '>=', $this->fechaInicio);
        }
        
        if ($this->fechaFin) {
            $this->call->whereDate('calls.date', '<=', $this->fechaFin);
        }
        
        $this->call = $this->call->get(['calls.*']);
    }
}