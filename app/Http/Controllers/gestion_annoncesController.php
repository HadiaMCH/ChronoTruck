<?php

namespace App\Http\Controllers;

use App\Models\wilaya;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class gestion_annoncesController extends Controller
{
    public function index()
    {        
        $annonces= annonce::all();
        $wilayas=wilaya::all();            
        return view('gestion_annonces',compact('annonces','wilayas'));
    }
}
