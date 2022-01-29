<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\wilaya;
use App\Models\annonce;
use App\Models\critere;
use Illuminate\Http\Request;
use App\Models\wilaya_wilaya;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use App\Http\Controllers\annonceController;
use App\Http\Controllers\Views\acceuilView;

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

        return (new acceuilView)->acceuil($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas,$news);

    }

    public function show()
    {

        $criteres_picked= critere::where('picked',1)->get();

        if(!$criteres_picked->contains('id','1') && !$criteres_picked->contains('id','2')){
            $annonces= annonce::where("status","!=","en attente")->where("archiver","0")->take(8)->get();
        }

        if(!$criteres_picked->contains('id','1') && $criteres_picked->contains('id','2')){
            $annonces= annonce::where("status","!=","en attente")->where("archiver","0")->orderBy('note', 'desc')->take(8)->get();
        }

        if($criteres_picked->contains('id','1') && !$criteres_picked->contains('id','2')){
            $annonces= annonce::where("status","!=","en attente")->where("archiver","0")->orderBy('created_at', 'desc')->take(8)->get();
        }

        if($criteres_picked->contains('id','1') && $criteres_picked->contains('id','2')){
            $annonces= annonce::where("status","!=","en attente")->where("archiver","0")->orderBy('created_at', 'desc')->orderBy('note', 'desc')->take(8)->get();
        }

        $wilayas=wilaya::all();
        $depart = [];
        $arriver = [];
        $i=0;
        foreach($annonces as $annonce){
            $depart[$i]=$wilayas[$annonce->tarjet->wilaya_depart_id -1]->nom;
            $arriver[$i]=$wilayas[$annonce->tarjet->wilaya_arriver_id -1]->nom;
            $i++;
        }

        if ($annonces->count()){
            return response()->json([
                'annonces' => $annonces,
                'depart' => $depart,
                'arriver' => $arriver,
            ]);
        }
        else{
            return response()->json([
                'status_code' => 502,
                'message' => 'Error in finding result dans la bdd',
            ]);
        }    
    }

    public function search(Request $request)
    {
        if($request->ville_depart!="" && $request->ville_arriver!="" ){
                $request->validate(['ville_depart'=>'string',
                'ville_arriver'=>'string',
            ]);
            $depart=$request->input('ville_depart');
            $arriver=$request->input('ville_arriver');

            $tarjet= wilaya_wilaya::where("wilaya_depart_id","$depart")->where("wilaya_arriver_id","$arriver")->first();
            $id=$tarjet->id;
            $annonces=annonce::where("wilaya_wilaya_id","$id")->where("status","!=","en attente")->where("archiver","0")->orderBy('created_at', 'desc')->get();;

            if ($annonces->count()){
                    
                return response()->json([
                    'annonces' => $annonces,
                ]);
            }
            else{
                return response()->json([
                    'status_code' => 502,
                    'message' => 'Error in finding result dans la bdd',
                ]);
            }
        }
        else{
            return response()->json([
                'status_code' => 503,
                'message' => 'des champs vide',
            ]);
        }
    }

}
