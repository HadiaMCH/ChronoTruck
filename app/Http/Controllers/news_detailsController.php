<?php 

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\news_detailsView;

class news_detailsController extends Controller
{
    public function index($id)
    {
        $news= news::where("id","$id")->first();

        (new news_detailsView)->news_details($news);

        return view('news_details',compact('news'));
    }

    public function views_news(Request $request)
    {
        $news= news::where("id","$request->id")->first();
        $views=$news->views+1;
        news::where("id","$request->id")->update(['views'=>$views]);
        $news= news::where("id","$request->id")->first();

        return redirect()->route('news_details', ['id' => $request->id]);        
    }
}