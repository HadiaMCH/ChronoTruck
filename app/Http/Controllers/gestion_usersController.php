<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\annonce;
use App\Models\user_wilaya;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\gestion_usersView;

class gestion_usersController extends Controller
{
    public function index()
    {       
        $clients= User::where("transporteur","0")->get();
        $transporteurs= User::where("transporteur","!=","0")->get();
        $transporteur_annonces= annonce::where("status","terminée")->where("signaler_transporteur","!=","NULL")->get();
        $client_annonces= annonce::where("status","terminée")->where("signaler_client","!=","NULL")->get();

        (new gestion_usersView)->gestion_users($clients,$transporteurs,$transporteur_annonces,$client_annonces);

        return view('gestion_users',compact('transporteur_annonces','client_annonces','transporteurs','clients'));
    }

    public function bannir(Request $request)
    {       
        User::where('id',$request->id)->delete();
        annonce::where('user_id',$request->id)->delete();
        user_wilaya::where('user_id',$request->id)->delete();
        annonce::where('transporteur_id',$request->id)->update(['transporteur_id'=>NULL]);
        return response()->json([
                'message' => 'user deleted',
            ]);    
    }

    public function valider_inscription(Request $request)
    {       
        User::where('id',$request->id)->update(['transporteur'=>2]);
        return response()->json([
                'message' => 'validated',
            ]);    
    }

    public function valider_certification(Request $request)
    {       
        User::where('id',$request->id)->update(['statut'=>'certifié']);
        return response()->json([
                'message' => 'validated',
            ]);
    }

    public function valider_demande_certification(Request $request)
    {
        User::where('id',$request->id)->update(['statut'=>'validée']);
        return response()->json([
                'message' => 'validated',
            ]);
    }

    public function refuser_justificatif(Request $request)
    {
        User::where('id',$request->id)->update(['statut'=>'refusée']);
        User::where('id',$request->id)->update(['justificatif'=>$request->justificatif]);

        return redirect()->route('gestion_users');        
    }
}
