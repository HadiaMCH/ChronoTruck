<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class acceuilController extends Controller
{
    
    public function index()
    {
        $news=news::all()->take(6);
        return view('acceuil',compact('news'));
    }

    public function search(Request $request)
    {
            $request->validate(['ville_depart'=>'string',
            'ville_arriver'=>'string',
        ]);
        $ville_depart=$request->input('ville_depart');
        $ville_arriver=$request->input('ville_arriver');
        $annonces= annonce::where("depart","$ville_depart")->where("arriver","$ville_arriver")->take(8)->get();
        if ($annonces->count()){
            return response()->json($annonces);
        }
        else{
            //no results !!!
        }
    }
}
