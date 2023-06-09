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
}
