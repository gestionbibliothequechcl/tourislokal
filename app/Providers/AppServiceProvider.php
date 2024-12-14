<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Article;
use App\Models\Category;
use App\Models\Setting;
use App\Models\SocialMedia;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::before(function ($user, $ability){
            return $user->hasRole('superadmin') ? true : null;
        });


        
        $socials_media = SocialMedia::all();
        $global_categories = Category::where('isActive', 1)->whereHas('articles')->withCount('articles') 
            ->orderBy('articles_count', 'DESC')->orderBy('created_at', 'DESC')->take(3)->get();
        $latest_articles = Article::where('isActive', 1)->orderBy('created_at', 'DESC')->latest()->take(6)->get();
        $last_categories = Category::where('isActive', 1)->orderBy('created_at', 'DESC')->with('articles')->latest()->take(10)->get();
        $tags = Tag::orderBy('id', 'DESC')->limit(6)->get();
        $article_most_popular = Article::where('isActive', 1)->orderBy('views', 'DESC')->limit(1)->get();
        $popular_article = Article::where('isActive', 1)->orderBy('views', 'DESC')->limit(8)->get();
        $most_views = Article::where('isActive', 1)->orderBy('views', 'DESC')->limit(1)->get();
        $articles = Article::where('isActive', 1)->orderBy('created_at', 'DESC')->get();
        $infos_settings = Setting::all();

        View::share('socials_media', $socials_media);
        View::share('global_categories', $global_categories);
        View::share('latest_articles', $latest_articles);
        view::share('last_categories', $last_categories);
        view::share('global_tag', $tags);
        view::share('article_most_popular', $article_most_popular);
        view()->share('global_popular_article', $popular_article);
        view()->share('mosts_views', $most_views);
        View()->share('articles', $articles);
        view()->share('infos_settings', $infos_settings);
        
    }
}
