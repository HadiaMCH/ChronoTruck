<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\annonceController;

class annonceController extends Controller
{
    public function index()
    {                
        return view('annonce');
    }

    public function add_annonce(Request $request)
    {        
        $request->validate([
            'titre'=>'string',
            'texte'=>'string',
            'img'=>'string',
            'depart'=>'string',
            'arriver'=>'string',
            'transport_type'=>'string',
            'fourchette_poid_min'=>'string',
            'fourchette_poid_max'=>'string',
            'fourchette_volume_min'=>'string',
            'fourchette_volume_max'=>'string',
            'moyen_transport'=>'string',
        ]);
        $img= Storage::disk('public')->put('images',$request->image);
        annonce::create([
            'titre'=>$request->titre,
            'img'=>$img,
            'texte'=>$request->texte,
            'depart'=>$request->depart,
            'arriver'=>$request->arriver,
            'transport_type'=>$request->transport_type,
            'fourchette_poid_min'=>$request->fourchette_poid_min,
            'fourchette_poid_max'=>$request->fourchette_poid_max,
            'fourchette_volume_min'=>$request->fourchette_volume_min,
            'fourchette_volume_max'=>$request->fourchette_volume_max,
            'status'=>'en attente',
            'tarif'=>null,
            'user_id'=>$request->session('id'),
            'user_id'=>$request->transport_type,        
        ]); 

        return redirect()->route('annonce');
        
    }

    public static function getEnumValues($table, $column) {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
      }
}
