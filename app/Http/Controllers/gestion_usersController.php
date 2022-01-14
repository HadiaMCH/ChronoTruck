<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class gestion_usersController extends Controller
{
    public function index()
    {       
        $clients= User::where("transporteur","0")->get();
        $transporteurs= User::where("transporteur","!=","0")->get();
        $transporteur_annonces= annonce::where("signaler_transporteur","!=","NULL")->get();
        $client_annonces= annonce::where("signaler_client","!=","NULL")->get();
        return view('gestion_users',compact('transporteur_annonces','client_annonces','transporteurs','clients'));
    }
}
