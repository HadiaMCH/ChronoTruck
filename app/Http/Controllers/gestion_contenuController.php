<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class gestion_contenuController extends Controller
{
    public function index()
    {  
        $contacts=contact::all();      
        return view('gestion_contenu',compact('contacts'));
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

}
