<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\statistiquesView;

class statistiquesController extends Controller
{
    public function index()
    {        
        (new statistiquesView)->statistiques();

        return view('statistiques');
    }
}
