<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class connexionController extends Controller
{
    public function check_user(Request $request)
    {        
        $request->validate([
            'email'=>'string',
            'password'=>'string',
        ]);
        $email=$request->email;
        $password=$request->password;

        $session= User::where('email',$email)->where('password',$password)->get();
        if(count($session)>0){
            $request->session->put();
            $request->session->put();
        }
        else{

        }
        return view('connexion');
    }
}
