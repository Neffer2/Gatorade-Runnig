<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'telefono' => ['required', 'string', 'max:10', 'unique:'.User::class],
            'foto' => ['required']
        ]); 

        $user = User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->telefono),
            'foto' => $this->upload_file($request)
        ]);


        event(new Registered($user));
 
        // Auth::login($user);

        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente');
    }

    public function upload_file (Request $request){
        $file = $request->file('foto');
        $fileName = $this->claveThree(10).time().'.'.$file->extension();
        $destinofile = public_path('/fotos');
        $file->move($destinofile, $fileName);
        
        return $fileName;
    }

    function claveThree($length = 3) { 
        return substr(str_shuffle("0123456789"), 0, $length); 
    }
}
