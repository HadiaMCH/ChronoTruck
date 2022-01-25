<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\contact;
use App\Models\critere;
use App\Models\documents;
use App\Models\transaction;
use App\Models\presentation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Views\gestion_contenuView;

class gestion_contenuController extends Controller
{
    public function index()
    {  
        $presentation=presentation::first();
        $contacts=contact::all();  
        $documents=documents::all();
        $transactions=transaction::all();  
        $criteres_picked= critere::where('picked',1)->get();
        $criteres= critere::all();

        (new gestion_contenuView)->gestion_contenu($contacts,$presentation);

        return view('gestion_contenu',compact('contacts','presentation','documents','transactions','criteres_picked','criteres'));
    }

    public function add_contact(Request $request)
    {   if($request->titre !="" && $request->contenu !=""){  

            $contact= contact::where('titre',$request->titre)->where('contenu',$request->contenu)->first();
            if(!$contact){
                contact::create([
                    'titre'=>$request->titre,
                    'contenu'=>$request->contenu,
                ]); 
                return response()->json([
                    'status_code' => 501,
                    'message' => 'bien inserer',
                ]);
            }
            else{
                return response()->json([
                    'status_code' => 502,
                    'message' => 'ce contact existe deja',
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

    public function add_presentation(Request $request){
        $img= Storage::disk('public')->putFile('presentation', $request->file('img'));
        $image= Storage::url($img);
        presentation::create([
            'img'=>$image,
            'texte'=>$request->texte,
            'video'=>$request->video,
            'fonctionnement'=>$request->fonctionnement,
        ]); 
        return redirect()->route('gestion_contenu');
    }

    public function modifier_presentation(Request $request){
       
    }

    public function add_document(Request $request)
    {
        documents::create([
            'name'=>$request->document,
        ]); 
        return redirect()->route('gestion_contenu');

    }

    public function supp_document(Request $request)
    {
        documents::where('id',$request->id)->delete();
        return redirect()->route('gestion_contenu');

    }

    public function pourcentage(Request $request)
    {
        transaction::where('id',$request->id)->update(['pourcentage'=>$request->pourcentage]);
        $transaction=transaction::where('id',$request->id)->first();
        $o_tarif=$transaction->annonce->tarjet->tarif;
        $tarif=$o_tarif+$o_tarif*$request->pourcentage/100;
        annonce::where('id',$transaction->annonce->id)->update(['tarif'=>$tarif]);

        return redirect()->route('gestion_contenu');
    }

    public function critere_add(Request $request)
    {
        $criteres= critere::all();

        foreach($criteres as $critere){

            if(in_array($critere->id,$request->criteres)){
                critere::where('id',$critere->id)->update(['picked'=>1]);
            }
            else{
                critere::where('id',$critere->id)->update(['picked'=>0]);
            }
        }

        return redirect()->route('gestion_contenu');

    }

}
