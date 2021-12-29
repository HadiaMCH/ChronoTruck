<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class presentationController extends Controller
{
    public function index()
    {        
        return view('presentation');
    }
}
