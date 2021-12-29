<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class newsController extends Controller
{
    public function index()
    {   
        $firstnews= news::where("id","<","6")->get();
        $news= news::where("id",">=","6")->get();
        return view('news',compact('news','firstnews'));
    }
}
