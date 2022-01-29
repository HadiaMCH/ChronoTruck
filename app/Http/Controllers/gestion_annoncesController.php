<?php

namespace App\Http\Controllers;
 
use App\Models\wilaya;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\gestion_annoncesView;

class gestion_annoncesController extends Controller
{
    public function index()
    {        
        $annonces= annonce::all();
        $wilayas=wilaya::all();    
        
        return (new gestion_annoncesView)->gestion_annonces($wilayas,$annonces);
    }

    public function valider_annonce(Request $request)
    {       
        $annonce=annonce::where('id',$request->id)->first();
        $tarif=$annonce->tarjet->tarif;
        annonce::where('id',$request->id)->update(['status'=>'validée','tarif'=>$tarif]);
        return response()->json([
                'message' => 'validated',
                'tarif'=> $tarif,
            ]);    
    }

    public function annuler_annonce(Request $request)
    {       
        annonce::where('id',$request->id)->delete();
        return response()->json([
                'message' => 'annonce deleted',
            ]);    
    }
}
