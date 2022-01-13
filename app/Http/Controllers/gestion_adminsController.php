<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class gestion_adminsController extends Controller
{
    public function login(Request $request)
    {   if($request->user_admin !="" && $request->password_admin !=""){  
            $request->validate([
                'user_admin'=>'string',
                'password_admin'=>'string',
            ]);

            $user_admin=$request->user_admin;
            $password_admin=$request->password_admin;

            $user= admin::where('admin_name',$user_admin)->where('password',$password_admin)->first();
            if($user){
                $request->session()->put('id',$user->id);
                $request->session()->put('admin_name',$user->admin_name);
                $request->session()->put('password_admin',$user->password_admin);
                
                return response()->json([
                    'status_code' => 501,
                    'message' => 'Login',
                ]);
            }
            else{
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Error in Login',
                ]);
            }
        }
        else{
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_name');
        $request->session()->forget('id');
        $request->session()->forget('password_admin');

        return redirect()->route('acceuilAdmin');
    }
}
