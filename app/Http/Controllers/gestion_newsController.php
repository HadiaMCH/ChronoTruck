<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class gestion_newsController extends Controller
{
    public function index()
    {        
        return view('gestion_news');
    }
}
