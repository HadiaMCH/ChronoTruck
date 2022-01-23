<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\documents;
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

        (new gestion_contenuView)->gestion_contenu($contacts,$presentation);

        return view('gestion_contenu',compact('contacts','presentation','documents'));
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

}
