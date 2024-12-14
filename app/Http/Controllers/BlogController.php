<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        $articles = Article::where('isActive', 1)->orderBy('created_at', 'DESC')->with('category')->paginate(7);
       
        return view('front.blog', compact('articles'));
    }
}
