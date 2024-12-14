<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    //
    public function index(){

        $articles = Article::all();
        
        return view('back.articles.list', ['articles' => $articles]);
    }


    public function create(){
        $categories = Category::where('isActive', 1)->get();
        return view('back.articles.create', ['categories'=> $categories]);
    }
    
    public function edit(Article $article){
        return "bonjour";
    }

    public function store(StoreArticleRequest $request)
    {
        // Valider les données
        $validatedData = $request->validated();
    
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->image->store('asset', 'public');
        }
      
    
        try {
          
            $article = Article::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'], 
                'image' => $imagePath, 
                'isActive' => (bool)$validatedData['isActive'],
                'isShare' => (bool)$validatedData['isShare'],
                'isComment' => (bool)$validatedData['isComment'],
                'category_id' => $validatedData['category_id'],
                'author_id' => Auth::id(), 
            ]);
    
            return to_route('articles.list')->with('success', "Article enregistré avec succès !");
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }
    }


    public function update(Article $article){

    }
}
