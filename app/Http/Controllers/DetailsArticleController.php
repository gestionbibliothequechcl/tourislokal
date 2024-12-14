<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class DetailsArticleController extends Controller
{
    //
    public function index(String $slug)
    {
        $article = Article::where('slug', $slug)->with('comments')->limit(5)->firstOrFail();
    
        $article->increment('views');
    
        return view('front.detailsArticle', ['article' => $article]);
    }
    
    

    public function comment(StoreStoreCommentRequest $request, int $id){
        $request->validated($request->all());

        $article = Article::where('id', $id)->first();

        Comment::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'web_site'=>$request->web_site,
            'message'=>$request->message,
            'article_id'=>$id
        ]);

        return back()->with('success', 'Commentaire envoye avec success !');
    }

    public function loadMoreComments(Request $request, $slug)
    {
        // Vérifier le nombre de commentaires déjà chargés (envoyé via la requête)
        $offset = $request->input('offset', 5); // Par défaut, on commence après les 5 premiers
        $limit = $request->input('limit', 5);  // Nombre de commentaires à charger par requête
    
        $article = Article::where('slug', $slug)
            ->with(['comments' => function ($query) use ($offset, $limit) {
                $query->whereNull('parent_id') // Charger uniquement les commentaires principaux
                      ->skip($offset) // Passer les commentaires déjà chargés
                      ->take($limit) // Charger un nombre limité de commentaires
                      ->orderBy('created_at', 'desc'); // Trier par date
            }])
            ->firstOrFail();
    
        $comments = $article->comments;
    
        return response()->json(['comments' => $comments]);
    }
    
    
    
    
}
