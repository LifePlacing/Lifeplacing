<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showPerfilUsuario()
    {
       return view('user.perfil');
    }


    public function update(Request $request)
    {
        $user = \Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->sexo =  $request->input('sexo'); 
       

        if ( !$request->input('password') == '') 
        {
            $user->password = bcrypt($request->input('password'));
        } 

         $validator = \Validator::make($request->all(), [
            'foto' => 'image:jpeg,jpg,png|max:2048'
        ]);

        if ($validator->fails()) {

            return back()->with(['errors'=>$validator->errors()]);
        
        } else {

            if(!empty($request->foto)){            

            $imageData = $request->foto;
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[0])[0];
            $idUser = $user->id;

            $request->foto->move(public_path('uploads/avatars/'.$idUser.'/'),$fileName);

            $user->foto = $fileName;   

            }             

        }        

        $user->save($request->all());

        return back()
            ->with('success','Sua conta foi atualizada!');  
        
    }  


}
