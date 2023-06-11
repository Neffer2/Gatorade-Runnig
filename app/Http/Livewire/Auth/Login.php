<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Validation\Rules; 
use Livewire\WithFileUploads;

class Login extends Component 
{   
    // Models
    public $email;
    public $pass;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email'
        ]);
    }

    public function updatedPass(){
        $this->validate([ 
            'pass' => 'required|string'
        ]);
    }

    protected $messages = [
        'email.required' => 'Éste campo es obligatorio.',
        'email.email' => 'Formato de correo electrónico no válido.',

        'pass.required' => 'Éste campo es obligatorio.',
        'pass.string' => 'Éste formato no es válido.',
    ];
}
