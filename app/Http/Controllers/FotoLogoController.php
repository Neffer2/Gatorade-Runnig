<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FotoLogoController extends Controller
{
    public function uploadPhotoLogo(Request $request){
        $dataUser = User::find(Auth::user()->id);
        $dataUser->foto_logos = $this->upload_file($request);
        $dataUser->update();

        $responseData = [
            'status' => 'ok',
            'data' => [
                'logo' => $dataUser->foto_logos
            ]
        ];

        return response()->json($responseData);
    }

    public function upload_file (Request $request){
        $file = $request->file('image');
        $fileName = $this->claveThree(10).time().'.'.$file->extension();
        $destinofile = public_path('/fotos_logo');
        $file->move($destinofile, $fileName);
        
        return $fileName;
    }

    function claveThree($length = 3) { 
        return substr(str_shuffle("0123456789"), 0, $length); 
    }
}
 