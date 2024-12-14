<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //
    public function list(){
        $articles = Article::all();
        
        return view('back.articles.list', ['articles' => $articles]);
    }

    public function create(){
        $categories = Category::where('isActive', 1)->get();
        return view('back.articles.create', ['categories'=> $categories]);
    }

    public function index(Article $article){
        $categories = Category::where('isActive', 1)->get();
        return view('back.articles.create', [
            'article'=> $article,
            'categories' => $categories
        ]);
    }

    public function store(StoreArticleRequest $request){
        // Valider les données
        $validatedData = $request->validated();
    
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->image->store('asset', 'public');
        }
        $tags = explode(',', $request->tags);
    
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

            $article->tag($tags);
    
            return to_route('post.index')->with('success', "Article enregistré avec succès !");
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }
    }

    public function update(UpdateArticleRequest $request, Article $article){
        // Valider les données
    $validatedData = $request->validated();

    $imagePath = $article->image; // Conserver l'ancienne image par défaut

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Supprimer l'ancienne image si elle existe
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }
        $imagePath = $request->image->store('asset', 'public');
    }

    $tags = explode(',', $request->input('tags'));
    $tags = array_map('trim', $tags); // Supprime les espaces inutiles
    
   
    $content = strip_tags($request->content);
    

    try {
        // Mise à jour des champs de l'article
        $article->update([
            'title' => $validatedData['title'],
            'content' => $content,
            'image' => $imagePath,
            'isActive' => (bool)$validatedData['isActive'],
            'isShare' => (bool)$validatedData['isShare'],
            'isComment' => (bool)$validatedData['isComment'],
            'category_id' => $validatedData['category_id'],
        ]);

        $article->tag($tags);

            return to_route('post.index')->with('success', "Article modifie avec succès !");
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }

    public function destroy(Article $article){

        $article->delete();

        return redirect()->back()->with('success', 'Article supprimer avec success !');
    }
    
}
