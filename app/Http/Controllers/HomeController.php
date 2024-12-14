<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        $articles = Article::where('isActive', 1)->orderBy('created_at', 'DESC')->limit(10)->get();
        $categories = Category::where('isActive', 1)->orderBy('created_at', 'DESC')->limit(3)->with('articles')->get();

        // Passer les données à la vue
        return view('home', compact('articles', 'categories'));

    }
}
