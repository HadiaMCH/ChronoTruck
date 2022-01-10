<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wilaya;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index()
    {   
        $id=session()->get('id');
        $user= User::where("id","$id")->first();
        $wilayas=wilaya::all();
        
        return view('profile',compact('user','wilayas'));
    }

    public function check_password(Request $request)
    {
        $password=$request->session()->get('password');
        if ( $password != $request->password ){
            return response()->json([
                'status' => "false",
              ]); 
        }
        else{
            return response()->json([
                'status' => "true",
              ]); 
        }      
    }

    public function modifier(Request $request)
    {
        if($request->name){
        $respense=User::where('id',$request->session()->get('id'))->update(['name' => $request->name]);
        return redirect()->route('profile');
        }
         
        if($request->familyname){
            $respense=User::where('id',$request->session()->get('id'))->update(['familyname' => $request->familyname]);
            return redirect()->route('profile');
        }

        if($request->email){
            $respense=User::where('id',$request->session()->get('id'))->update(['email' => $request->email]);
            return redirect()->route('profile');
        }

        if($request->new_password){
            $respense=User::where('id',$request->session()->get('id'))->update(['password' => $request->new_password]);
            return redirect()->route('profile');
        }

        if($request->address){
            $respense=User::where('id',$request->session()->get('id'))->update(['address' => $request->address]);
            return redirect()->route('profile');
        }
        
        if($request->phone){


            $respense=User::where('id',$request->session()->get('id'))->update(['phone' => $request->phone]);
            return redirect()->route('profile');
        }
        
        if($request->wilaya){
            $respense=User::where('id',$request->session()->get('id'))->update(['phone' => $request->wilaya]);
            return redirect()->route('profile');
        }

    }
    public function etre_transporteur(Request $request)
    {
        $respense=User::where('id',$request->session()->get('id'))->update(['transporteur' => 1]);

        $wilaya=json_encode($request->wilaya);

        $respense=User::where('id',$request->session()->get('id'))->update(['wilaya' => $wilaya]);
        return redirect()->route('profile');
    }

    public function etre_certifie(Request $request)
    {
        $respense=User::where('id',$request->session()->get('id'))->update(['certifie' => 1]);
        $demande= Storage::disk('public')->put('demandes',$request->demande);
        $dmd= Storage::url($demande);
        $statut='en attente';

        $respense=User::where('id',$request->session()->get('id'))->update(['demande' => $dmd]);
        $respense=User::where('id',$request->session()->get('id'))->update(['statut' => $statut]);

        return redirect()->route('profile');
    }

    public function noter_transporteur(Request $request){
        User::where('id',$request->id_tranporteur)->increment('note' , $request->note);
        annonce::where('id',$request->id_annonce)->update(['note' => $request->note]);
        return response()->json([
            'status' => "rated",
          ]); 
    }

    public function signaler_transporteur(Request $request){
        annonce::where('id',$request->id_annonce)->update(['signale' => $request->texte]);
        return response()->json([
            'status' => "signaled",
          ]); 
    }
}

