<?php

namespace App\Http\Controllers;

use App\Models\presentation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class presentationController extends Controller
{
    public function index()
    {        
        $presentation=presentation::first();
        return view('presentation',compact('presentation'));

    }
}
