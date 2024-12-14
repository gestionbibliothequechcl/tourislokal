<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //

    public function edit(Article $article){
        return view('back.articles.create', compact('article'));
    }
}
