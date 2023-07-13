<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Tutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class Register extends Component
{

    // Definicion de variables
    public $user = [
        'name' => '',
        'email' => '',
        'password' => '',
        'type' => ''
    ];

    public $name, $email, $password, $apellido, $celular, $fecha_nacimiento;

    // protected $layout = 'layouts.user';

    public function render()
    {
        return view('livewire.register')
                ->layout('layouts.user-register');
    }

    public function limpiarCampos() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->fecha_nacimiento='dd/mm/aaaa';
        $this->apellido='';
        $this->celular='';
    }

    public function crear()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required']
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' =>  'T'
        ]);

        Tutor::create([
            'name' => $this->name,
            'lastname' => $this->apellido,
            'birthDay' => $this->fecha_nacimiento,
            'isActive' => true,
            'phoneNumber' => $this->celular,
            'profilePhoto' =>  '',
            'user_id' =>  $user->id
        ]);


        Auth::login($user);

        $stripeCustomer = $user->createAsStripeCustomer();

        return redirect()->to('plan');
        // if(Auth::login($user)) {
        // }

        // $this->limpiarCampos();
    }
}
