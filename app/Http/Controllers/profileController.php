<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wilaya;
use App\Models\annonce;
use App\Models\documents;
use App\Models\transaction;
use App\Models\user_wilaya;
use Illuminate\Http\Request;
use App\Models\wilaya_wilaya;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Views\profileView;

class profileController extends Controller
{
    public function index($id)
    {   
        $user= User::where("id","$id")->first();
        $wilayas=wilaya::all();
        $documents=documents::all();        

        (new profileView)->profile($wilayas,$user);
        
        return view('profile',compact('user','wilayas','documents'));
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
        return redirect()->route('profile_id', ['id' => $request->session()->get('id')]);
        }
         
        if($request->familyname){
            $respense=User::where('id',$request->session()->get('id'))->update(['familyname' => $request->familyname]);
            return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
        }

        if($request->email){
            $respense=User::where('id',$request->session()->get('id'))->update(['email' => $request->email]);
            return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
        }

        if($request->new_password){
            $respense=User::where('id',$request->session()->get('id'))->update(['password' => $request->new_password]);
            return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
        }

        if($request->address){
            $respense=User::where('id',$request->session()->get('id'))->update(['address' => $request->address]);
            return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
        }
        
        if($request->phone){


            $respense=User::where('id',$request->session()->get('id'))->update(['phone' => $request->phone]);
            return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
        }
        
        if($request->depart && $request->arriver){

            user_wilaya::where('user_id',$request->session()->get('id'))->delete();
            foreach($request->depart as $depart){
                foreach($request->arriver as $arriver){
                    $target= wilaya_wilaya::where("wilaya_depart_id","$depart")->where("wilaya_arriver_id","$arriver")->first();
                    user_wilaya::create([
                        'user_id'=>$request->session()->get('id'),
                        'wilaya_wilaya_id'=>$target->id,
                    ]);
                }
            }

            return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
        }

    }

    public function etre_transporteur(Request $request)
    {
            foreach($request->depart as $depart){
                foreach($request->arriver as $arriver){
                    $target= wilaya_wilaya::where("wilaya_depart_id","$depart")->where("wilaya_arriver_id","$arriver")->first();
                    user_wilaya::create([
                        'user_id'=>$request->session()->get('id'),
                        'wilaya_wilaya_id'=>$target->id,
                    ]);
                }
            }

            $respense=User::where('id',$request->session()->get('id'))->update(['transporteur' => 1]);

        return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
    }

    public function etre_certifie(Request $request)
    {
        $respense=User::where('id',$request->session()->get('id'))->update(['status' => "en attente"]);
        $demande= Storage::disk('public')->put('demandes',$request->demande);
        $dmd= Storage::url($demande);
        $statut='en attente';

        $respense=User::where('id',$request->session()->get('id'))->update(['demande' => $dmd]);
        $respense=User::where('id',$request->session()->get('id'))->update(['statut' => $statut]);

        return redirect()->route('profile_id', ['id' =>$request->session()->get('id')]);
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

    public function accepter_transaction($id_transaction){
        $transaction=transaction::where('id',$id_transaction)->first();
        annonce::where('id',$transaction->annonce->id)->update(['status' =>'terminée','transporteur_id' =>$transaction->transporteur->id]);
        return redirect()->route('annonce', ['id' => $transaction->annonce->id]);                
    }

    public function refuser_transaction($id_transaction){
        $transaction=transaction::where('id',$id_transaction)->delete();
        return redirect()->route('profile_id', ['id' => $id_user]); 
        return redirect()->route('annonce', ['id' => $transaction->annonce->id]);                               
    }
}

