<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wilaya;
use App\Models\annonce;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index($id)
    {   
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
        User::where('id',$request->id_transporteur)->increment('note' , $request->note);
        annonce::where('id',$request->id_annonce)->update(['note' => $request->note]);
        return response()->json([
            'status' => "rated",
          ]); 
    }

    public function signaler_transporteur(Request $request){
        annonce::where('id',$request->id_annonce)->update(['signaler_transporteur' => $request->texte]);
        return response()->json([
            'status' => "signaled",
          ]); 
    }

    public function signaler_client(Request $request){
        annonce::where('id',$request->id_annonce)->update(['signaler_client' => $request->texte]);
        return response()->json([
            'status' => "signaled",
          ]); 
    }

    public function transporteur_add_transaction($id, Request $request){
        $annonce=annonce::where('id',$id)->first();
        $id_user= $request->session()->get('id');
        $transaction=transaction::create([
            'annonce_id'=>$id,
            'client_id'=>$annonce->user_id,
            'transporteur_id'=>$id_user,
            'contenu'=>'il vous demande de vous transporter',
        ]);

        return redirect()->route('profile_id', ['id' => $id_user]);                
    }

    public function client_add_transaction($id,$id_transporteur, Request $request){
        $annonce=annonce::where('id',$id)->first();
        $id_user= $request->session()->get('id');
        $transaction=transaction::create([
            'annonce_id'=>$id,
            'client_id'=>$id_user,
            'transporteur_id'=>$id_transporteur,
            'contenu'=>'il vous demande de le transporter',
        ]);

        return redirect()->route('profile_id', ['id' => $id_user]);                
    }
}

