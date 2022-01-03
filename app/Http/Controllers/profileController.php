<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wilaya;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class profileController extends Controller
{
    public function index()
    {   
        $id=session()->get('id');
        $user= User::where("id","$id")->first();
        $wilayas=wilaya::all();

        return view('profile',compact('user','wilayas'));
    }
}
