<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\wilaya;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use App\Http\Controllers\annonceController;

class acceuilController extends Controller
{
    
    public function index()
    {
        $status= annonceController::getEnumValues('annonces','status');
        $transport_types= annonceController::getEnumValues('annonces','transport_type');
        $fourchette_poid_mins= annonceController::getEnumValues('annonces','fourchette_poid_min');
        $fourchette_poid_maxs= annonceController::getEnumValues('annonces','fourchette_poid_max');
        $fourchette_volume_mins= annonceController::getEnumValues('annonces','fourchette_volume_min');
        $fourchette_volume_maxs= annonceController::getEnumValues('annonces','fourchette_volume_max');
        $moyen_transports= annonceController::getEnumValues('annonces','moyen_transport');
        $wilayas=wilaya::all();
        $news=news::all()->take(6);
        return view('acceuil',compact('news','status','transport_types','fourchette_poid_mins','fourchette_poid_maxs','fourchette_volume_mins','fourchette_volume_maxs','moyen_transports','wilayas'));
    }

    public function show()
    {
        $annonces= annonce::where("status","validée")->where("archiver","0")->orderBy('updated_at', 'desc')->take(8)->get();
        
        if ($annonces->count()){

            foreach ($annonces as $annonce){ 
                $annonce->created_at= Carbon::parse($annonce->created_at)->format('h:i d/m/Y');
                }
            return response()->json($annonces);
        }
        else{
            return response()->json([
                //no annonce dans la bdd
              ]);
        }    
    }

    public function search(Request $request)
    {
            $request->validate(['ville_depart'=>'string',
            'ville_arriver'=>'string',
        ]);
        $ville_depart=$request->input('ville_depart');
        $ville_arriver=$request->input('ville_arriver');
        $annonces= annonce::where("depart","$ville_depart")->where("arriver","$ville_arriver")->where("archiver","0")->take(8)->get();
        if ($annonces->count()){
            foreach ($annonces as $annonce){ 
                $annonce->created_at= Carbon::parse($annonce->created_at)->format('h:i d/m/Y');
                }
                
            return response()->json($annonces);
        }
        else{
            return response()->json([
                //no result de recherche
              ]);
        }
    }

}
