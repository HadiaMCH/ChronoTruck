<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\statistiquesView;

class statistiquesController extends Controller
{
    public function index()
    {        
        $clients=User::where('transporteur','0')->count();
        $clients_t=User::where('transporteur','1')->count();
        $transporteurs=User::where('transporteur','2')->count();
        $transporteurs_c=User::where('statut','certifié')->count();

        $annonces_v=annonce::where('status','validée')->count();
        $annonces_e=annonce::where('status','en attente')->count();
        $annonces_t=annonce::where('status','terminée')->count();

        $clients=$clients+$clients_t;

        (new statistiquesView)->statistiques($clients,$transporteurs,$transporteurs_c,$annonces_v,$annonces_e,$annonces_t);

        return view('statistiques',compact('clients','transporteurs','transporteurs_c','annonces_v','annonces_e','annonces_t'));
    }
}
