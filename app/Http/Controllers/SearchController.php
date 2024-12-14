<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'search_key'=> ['string', 'required']
        ]);
        
       
        $articles = Article::where('title', 'like', "%{$request->search_key}%")
                           ->orWhere('content', 'like', "%{$request->search_key}%")->paginate(10);

        return view('front.search', compact('articles'));
    }


}