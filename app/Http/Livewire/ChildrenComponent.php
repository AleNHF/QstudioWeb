<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;

use Livewire\Component;
use App\Models\Children;
use App\Models\Content;
use App\Models\Tutor;


class ChildrenComponent extends Component
{   
    public $children_id;
    public $name;
    public $lastname;
    public $alias;
    public $birthDay;
    public $gender;
    public $profilePhoto;
    public $tutor_id;
    public $mostrarContenido = false;
    public $state=true;
    public $hijoId;
    public $tutor;
    public $photo;

    public function render()
    {
        $usuario = auth()->user();
        $this->tutor=Tutor::where('user_id',$usuario->id)->first();
        $child = Children::where('tutor_id',$this->tutor->id)->get();

        return view('livewire.children', compact('child'))
        ->extends('layouts.app');
    }

    
    use WithFileUploads;
    public function store(){
        //dd($this->name,$this->lastname,$this->alias,$this->birthDay,$this->gender,$this->profilePhoto,$this->tutor->id);
        $this->setState(true);
        $children = New Children();

        $children -> name= $this->name;
        $children -> lastname=$this->lastname;
        $children -> alias=$this->alias;
        $children -> birthDay=$this->birthDay;
        $children -> gender=$this->gender;
        $children->profilePhoto = ($this->gender == "M") ? 
        'img/boy.png' : 'img/girl.png';

        $children -> tutor_id=$this->tutor->id;
        
        $children->save();

    }

    public function clear(){
        $this->name="";
        $this->lastname="";
        $this->alias="";
        $this->birthDay="";
        $this->gender="";
        $this->profilePhoto="";

        $this->setState(true);
    }

    public function edit($id)
    {

        $child = Children::find($id);
        $this->clear();
        if ($child) {
            $this->setState(false);
            $this->children_id = $child->id;
            $this->name = $child->name;
            $this->lastname = $child->lastname;
            $this->alias = $child->alias;
            $this->birthDay = $child->birthDay;
            $this->gender = $child->gender;
            $this->profilePhoto = $child->profilePhoto;
            $this->tutor_id = $this->tutor->id;
        }

    }

    public function update($id)
    {
        $child = Children::find($id);

    if ($child) {

        $child->name = $this->name;
        $child->lastname = $this->lastname;
        $child->alias = $this->alias;
        $child->birthDay = $this->birthDay;
        $child->gender = $this->gender;
        $child->profilePhoto = $this->profilePhoto;
        $child->tutor_id = $this->tutor->id;
        $child->save();

        $this->setState(true);
    }

    }

    public function delete($id)
    {
        $child = Children::find($id);

        if ($child) {
            $child->delete();
        }
        $this->clear();
    }

    private function setState($state)
    {
        $this->state = $state;
    }

    private function resetForm()
    {
        $this->name = '';
        $this->lastname = '';
        $this->alias = '';
        $this->birthDay = '';
        $this->gender = '';
        $this->profilePhoto = '';

    }



    public function showContent($childId)
    {
       // return redirect()->route('content.render', ['child' => $childId]);
        return redirect()->to(route('content.render', ['child' => $childId]));
    }

    public function sumar(){
        $this->emit('logro10');
    }
}
