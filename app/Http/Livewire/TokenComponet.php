<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Children;
use App\Models\Tutor;
use App\Models\Token;

class TokenComponet extends Component
{   public $code;
    public $createDate;
    public $status;
    public $registerDate;
    public $children_id;
    public $tutor;
    public $allChild;

    public $children;
    public $ids=0;
    public $msj = false;

    public function render()
    {   $usuario = auth()->user();
        $this->tutor = Tutor::where('user_id', $usuario->id)->first();
        
        $this->children = Children::join('tokens', 'children.id', '=', 'tokens.children_id')
            ->where('children.tutor_id', $this->tutor->id)
            ->get();

        $this->allChildren();
        return view('livewire.token-componet')->extends('layouts.app');
    }

    public function allChildren(){
        $usuario = auth()->user();
        $this->tutor=Tutor::where('user_id',$usuario->id)->first();
        $this->allChild = Children::where('tutor_id',$this->tutor->id)->get();
    }

    public function store(){
        
        if (empty($this->children_id)) {
       
            $this->msj=true;
            return;
        }

        $existingCodes = Token::pluck('code')->toArray();

        do {
            $code = mt_rand(100000, 999999);
        } while (in_array($code, $existingCodes));

        $token = New Token();
        $token -> code = $code;
        $token -> createDate = now()->format('Y-m-d');
        $token -> status = 0;
        $token -> registerDate=now()->format('Y-m-d');
        $token -> children_id = $this->children_id;
        $token->save();
        $this->msj = false;
        $this->clear();
    }

    public function clear(){
        $this->children_id=null;
    }

    public function hideErrorMessage()
    {
        $this->msj = false;
    }

}
