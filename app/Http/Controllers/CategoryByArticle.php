<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryByArticle extends Controller
{
    //
    public function index(String $slug)
    {
        
        $category = Category::where('slug', $slug)->where('isActive', 1)->firstOrFail();
    
        $articles = $category->articles()->paginate(12);
    
        return view('front.article_by_category', compact('category', 'articles'));
    }
    
}
