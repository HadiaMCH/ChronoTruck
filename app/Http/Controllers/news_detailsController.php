<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class news_detailsController extends Controller
{
    public function index($id)
    {
        $news= news::where("id","$id")->first();
        return view('news_details',compact('news'));
    }
}