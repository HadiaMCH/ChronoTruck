<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\contactView;

class contactController extends Controller
{
    public function index()
    {
        $contacts=contact::all();

        return (new contactView)->contact($contacts);

    }
}
