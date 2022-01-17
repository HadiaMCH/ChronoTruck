<?php

namespace App\Http\Controllers;

use App\Models\presentation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\presentationView;

class presentationController extends Controller
{
    public function index()
    {        
        $presentation=presentation::first();

        (new presentationView)->presentation($presentation);

        return view('presentation',compact('presentation'));

    }
}
