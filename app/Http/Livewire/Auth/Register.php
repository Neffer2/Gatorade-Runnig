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
            'telefono' => 'required|numeric|string|unique:users'
        ]); 
    }

    public function updatedFoto(){
        $this->validate([
            'foto' => 'required|image'
        ]);
    }

    protected $messages = [
        'nombre.required' => 'Éste campo es obligatorio.',
        'nombre..string' => 'Éste formato no es válido.',
        'nombre.max' => 'Tu correo excede nuestro límite de caracteres.',

        'correo.required' => 'Éste campo es obligatorio.',
        'correo.email' => 'Formato de correo electrónico no válido.',
        'correo.unique' => 'Esta direccion de correo electrónico ya fué registrada.',
        'correo.max' => 'Tu correo excede nuestro límite de caracteres.',

        'telefono.required' => 'Éste campo es obligatorio.',
        'telefono.numeric' => 'Éste campo debe contener únicamente números.',
        'telefono.unique' => 'Éste número de teléfono ya fué registrado.',
        'telefono.max' => 'Tu teléfono excede nuestro límite de caracteres.',

        'foto.required' => 'Éste campo es obligatorio.',
        'foto.required' => 'Debes adjuntar una foto.',
        'foto.max' => 'El peso de tu foto excede nuestro límite.',
    ];
}
