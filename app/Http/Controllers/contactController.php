<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class contactController extends Controller
{
    public function index()
    {
        $contacts=contact::all();
        return view('contact',compact('contacts'));
    }
}
