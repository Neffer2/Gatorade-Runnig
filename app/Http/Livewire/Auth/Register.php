<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Validation\Rules; 
use Livewire\WithFileUploads;
 
class Register extends Component
{   
    use WithFileUploads;
    // Models
    public $nombre;
    public $correo;
    public $telefono;
    public $foto;
    public $legal; 

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function updatedNombre(){
        $this->validate([
            'nombre' => 'required|string|max:254'
        ]);
    }

    public function updatedCorreo(){
        $this->validate([
            'correo' => 'required|string|max:254|email|unique:users'
        ]);
    }

    public function updatedTelefono(){
        $this->validate([
            'telefono' => 'required|string|max:10|unique:users'
        ]); 
    }

    public function updatedFoto(){
        $this->validate([
            'foto' => 'required|image|max:1024'
        ]);
    }
}
