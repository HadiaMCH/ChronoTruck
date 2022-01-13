<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class gestion_newsController extends Controller
{
    public function index()
    {        
        $news=news::all();
        return view('gestion_news',compact('news'));
    }

    public function add_news(Request $request)
    {   
        $img= Storage::disk('public')->put('news',$request->image);
        $image= Storage::url($img);
        $news=news::create([
            'titre'=>$request->titre,
            'description'=>$request->description,
            'paragraph'=>$request->paragraph,
            'img'=>$image,
        ]); 
        
        return redirect()->route('gestion_news');        
    }
}
