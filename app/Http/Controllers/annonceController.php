<?php

namespace App\Http\Controllers;

use App\Models\wilaya;
use App\Models\annonce;
use Illuminate\Http\Request;
use App\Models\wilaya_wilaya;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\annonceController;

class annonceController extends Controller
{
    public function index($id)
    {    
        $transport_types= annonceController::getEnumValues('annonces','transport_type');
        $fourchette_poid_mins= annonceController::getEnumValues('annonces','fourchette_poid_min');
        $fourchette_poid_maxs= annonceController::getEnumValues('annonces','fourchette_poid_max');
        $fourchette_volume_mins= annonceController::getEnumValues('annonces','fourchette_volume_min');
        $fourchette_volume_maxs= annonceController::getEnumValues('annonces','fourchette_volume_max');
        $moyen_transports= annonceController::getEnumValues('annonces','moyen_transport');
        $wilayas=wilaya::all();            
        $annonce= annonce::where("id","$id")->first();
        return view('annonce',compact('annonce','transport_types','fourchette_poid_mins','fourchette_poid_maxs','fourchette_volume_mins','fourchette_volume_maxs','moyen_transports','wilayas'));
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
        $image= Storage::url($img);
        $annonce=annonce::create([
            'titre'=>$request->titre,
            'img'=>$image,
            'texte'=>$request->texte,
            'transport_type'=>$request->transport_type,
            'fourchette_poid_min'=>$request->fourchette_poid_min,
            'fourchette_poid_max'=>$request->fourchette_poid_max,
            'fourchette_volume_min'=>$request->fourchette_volume_min,
            'fourchette_volume_max'=>$request->fourchette_volume_max,
            'tarif'=>null,
            'user_id'=>$request->session()->get('id'),
        ]); 

        $target= wilaya_wilaya::where("wilaya_depart_id","$request->depart")->where("wilaya_arriver_id","$request->arriver")->first();
        annonce::where('id',$annonce->id)->update(['wilaya_wilaya_id'=>$target->id]);
        
        return redirect()->route('annonce', ['id' => $annonce->id]);        
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

      public function delete($id)
      {
        annonce::where('id',$id)->update(['archiver'=>1]);
        return redirect()->route('acceuil');        
      }

      public function cancel($id)
      {
        annonce::where('id',$id)->delete();
        return redirect()->route('acceuil');        
      }

      public function modifier(Request $request,$id)
      {
        $annonce = annonce::where('id',$id)->first();
          if($request->titre != $annonce->titre){
            annonce::where('id',$id)->update(['titre'=>$request->titre]);
          }

          if($request->texte != $annonce->texte){
            annonce::where('id',$id)->update(['texte'=>$request->texte]);
          }

          if($request->image){
            $img= Storage::disk('public')->put('images',$request->image);
            $image= Storage::url($img);
            annonce::where('id',$id)->update(['img'=>$image]);
          }

          if($request->depart != $annonce->tarjet->wilaya_depart_id){
            $id_arriver=$annonce->tarjet->wilaya_arriver_id;
            $tarjet= wilaya_wilaya::where("wilaya_depart_id","$request->depart")->where("wilaya_arriver_id","$id_arriver")->first();
            annonce::where('id',$id)->update(['wilaya_wilaya_id'=>$tarjet->id]);
          }

          if($request->arriver != $annonce->tarjet->wilaya_arriver_id){
            $id_depart=$annonce->tarjet->wilaya_depart_id;
            $tarjet= wilaya_wilaya::where("wilaya_depart_id","$id_depart")->where("wilaya_arriver_id","$request->arriver")->first();              
            annonce::where('id',$id)->update(['wilaya_wilaya_id'=>$tarjet->id]);
          }

          if($request->transport_type != $annonce->transport_type){
            annonce::where('id',$id)->update(['transport_type'=>$request->transport_type]);
          }

          if($request->fourchette_poid_min != $annonce->fourchette_poid_min){
            annonce::where('id',$id)->update(['fourchette_poid_min'=>$request->fourchette_poid_min]);
          }

          if($request->fourchette_poid_max != $annonce->fourchette_poid_max){
            annonce::where('id',$id)->update(['fourchette_poid_max'=>$request->fourchette_poid_max]);
          }

          if($request->fourchette_volume_min != $annonce->fourchette_volume_min){
            annonce::where('id',$id)->update(['fourchette_volume_min'=>$request->fourchette_volume_min]);
          }

          if($request->fourchette_volume_max != $annonce->fourchette_volume_max){
            annonce::where('id',$id)->update(['fourchette_volume_max'=>$request->fourchette_volume_max]);
          }

          if($request->moyen_transport != $annonce->moyen_transport){
            annonce::where('id',$id)->update(['moyen_transport'=>$request->moyen_transport]);
          }

          return redirect()->route('annonce', ['id' => $id]);        
      }
}
