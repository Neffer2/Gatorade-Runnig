<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Validation\Rules; 
use Livewire\WithFileUploads;

class Login extends Component
{   

    public function render()
    {
        return view('livewire.auth.login');
    }
}
