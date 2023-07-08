<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Children;
use App\Models\File;

class FileComponet extends Component
{
    public $children;
    public $file;
    public $ids=0;

    public function render()
    {
        return view('livewire.file-componet');
    }

    public function mount($child)
    {
        $this->child = $child;
        $this->store();
    }

    public function store(){
        $this->children=Children::where('id',$this->child)->first();
        $this->file=File::where('children_id',$this->child)->get();

    }
}
