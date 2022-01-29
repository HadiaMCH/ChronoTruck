<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\User;
use App\Models\wilaya;
use App\Models\user_wilaya;
use Illuminate\Http\Request;
use App\Models\wilaya_wilaya;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\authController;
use App\Http\Controllers\Views\authView;

class authController extends Controller
{
    public function login(Request $request)
    {   if($request->email !="" && $request->password !=""){  
            $request->validate([
                'email'=>'string',
                'password'=>'string',
            ]);

            $email=$request->email;
            $password=$request->password;

            $user= User::where('email',$email)->where('password',$password)->first();
            if($user){
                $request->session()->put('id',$user->id);
                $request->session()->put('name',$user->name);
                $request->session()->put('familyname',$user->familyname);
                $request->session()->put('transporteur',$user->transporteur);
                $request->session()->put('password',$user->password);
                $request->session()->put('statut',$user->statut);
                
                
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
                'message' => 'contenu vide',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('name');
        $request->session()->forget('id');
        $request->session()->forget('password');
        $request->session()->forget('familyname');
        $request->session()->forget('transporteur');
        $request->session()->forget('statut');

        return redirect()->route('acceuil');
    }

    public function register_show()
    {        
        $wilayas=wilaya::all();
        $statut_creation='before';

        return (new authView)->inscription($wilayas,$statut_creation);
    }

    public function register(Request $request)
    {        
        $request->validate(['nom'=>'string',
            'prenom'=>'string',
            'phone'=>'string',
            'email'=>'string',
            'password'=>'string',
            'adresse'=>'string',
        ]);
        // client
        if (!$request->transporteur){ 
            User::create([
                'name'=>$request->nom,
                'familyname'=>$request->prenom,
                'email'=>$request->email,
                'password'=>$request->password,
                'address'=>$request->adresse,
                'phone'=>$request->phone,
            ]);  
        }
        else{
            $transporteur=1;
            if(!$request->certifie){ //transporteur non certifie
                $user=User::create([
                    'name'=>$request->nom,
                    'familyname'=>$request->prenom,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'address'=>$request->adresse,
                    'phone'=>$request->phone,
                    'transporteur'=>$transporteur,
                ]);
                foreach($request->depart as $depart){
                    foreach($request->arriver as $arriver){
                        $target= wilaya_wilaya::where("wilaya_depart_id","$depart")->where("wilaya_arriver_id","$arriver")->first();
                        user_wilaya::create([
                            'user_id'=>$user->id,
                            'wilaya_wilaya_id'=>$target->id,
                        ]);
                    }
                }
            }
            else{ //transporteur certifie
                $statut="en attente";
                $demande= Storage::disk('public')->putFile('demandes', $request->file('demande'));
                $dmd= Storage::url($demande);
                $user=User::create([
                    'name'=>$request->nom,
                    'familyname'=>$request->prenom,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'address'=>$request->adresse,
                    'phone'=>$request->phone,
                    'transporteur'=>$transporteur,
                    'statut'=>$statut,
                    'demande'=>$dmd,
                ]);  
                foreach($request->depart as $depart){
                    foreach($request->arriver as $arriver){
                        $target= wilaya_wilaya::where("wilaya_depart_id","$depart")->where("wilaya_arriver_id","$arriver")->first();
                        user_wilaya::create([
                            'user_id'=>$user->id,
                            'wilaya_wilaya_id'=>$target->id,
                        ]);
                    }
                }
            }
        } 
        $wilayas=wilaya::all();
        $statut_creation='after';
        return (new authView)->inscription($wilayas,$statut_creation);
    }

}
