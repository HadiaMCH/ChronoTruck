<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\contactView;

class contactController extends Controller
{
    public function index()
    {
        $contacts=contact::all();

        (new contactView)->contact($contacts);

        return view('contact',compact('contacts'));
    }
}
