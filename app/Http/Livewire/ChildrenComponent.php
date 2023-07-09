<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Children;
use App\Models\Content;

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

    public function render()
    {
        $child = Children::all();
        return view('livewire.children', compact('child'))
        ->extends('layouts.app');
    }

    public function test(){
        dd('test');
    }

    public function store(){
        $this->setState(true);

        $children = New Children();

        $children -> name= $this->name;
        $children -> lastname=$this->lastname;
        $children -> alias=$this->alias;
        $children -> birthDay=$this->birthDay;
        $children -> gender=$this->gender;
        $children -> profilePhoto=$this->profilePhoto;
        $children -> tutor_id=$this->tutor_id;

        $children->save();

    }

    public function clear(){
        $this->name="";
        $this->lastname="";
        $this->alias="";
        $this->birthDay="";
        $this->gender="";
        $this->profilePhoto="";
        $this->tutor_id=1;

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
            $this->tutor_id = $child->tutor_id;
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
        $child->tutor_id = $this->tutor_id;

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
        $this->tutor_id = '';
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
