<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $password, $email;

    public function render()
    {
        return view('livewire.login')
        ->extends('layouts.user-login');
    }

    public function limpiarCampos() {
        $this->email = '';
        $this->password = '';
    }

    public function submit()
    {
       $this->validate([
        'email' => 'required|email',
        'password' => 'required'
       ]);

    //    $user = Auth::getUser();

    // $this->autheticate();

    if(Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        // Auth::login($user);
        return redirect()->to('/welcome');
        // return redirect()->intended('/welcome');
        } else {
            // $this-> email = "error";
            return redirect()->to('/');
        }

        // $this->limpiarCampos();

    }
}
