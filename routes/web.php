<?php

use App\Http\Controllers\Article\PostsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\CategoryByArticle;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\SocialMedia\SocialMediaController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', [HomeController::class, 'home'])->name('home');

//Permission route
Route::get('/list/permissions', [PermissionController::class, 'index'])->name('list.permission');
Route::get('/create/permissions', [PermissionController::class, 'create'])->name('create.permission');
Route::post('/store/permissions', [PermissionController::class, 'store'])->name('store.permission');
Route::get('/edit/{id}/permissions', [PermissionController::class, 'edit'])->name('edit.permission');
Route::put('/permissions/{id}/update', [PermissionController::class, 'update'])->name('update.permission');
Route::delete('/permissions/{id}/delete', [PermissionController::class, 'destroy'])->name('destroy.permission');

//Roles
Route::get('/list/roles', [RolesController::class, 'index'])->name('list.roles');
Route::get('/create/roles', [RolesController::class, 'create'])->name('create.roles');
Route::post('/store/roles', [RolesController::class, 'store'])->name('store.roles');
Route::get('/edit/{id}/role', [RolesController::class, 'edit'])->name('edit.roles');
Route::put('/update/{id}/role', [RolesController::class, 'update'])->name('update.roles');
Route::delete('/delete/{id}/role', [RolesController::class, 'destroy'])->name('destroy.roles');

//users routes
Route::get('/users', [UserController::class, 'index'])->name('users.list');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/create', [UserController::class, 'create'])->name('create.users');
Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//route category article
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

//routes articles
Route::get('/post', [PostsController::class, 'list'])->name('post.index');
Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::get('/edit/post/{article}', [PostsController::class, 'index'])->name('post.edit');
Route::post('/store/post', [PostsController::class, 'store'])->name('post.store');
Route::put('/update/post/{article}', [PostsController::class, 'update'])->name('post.update');
Route::delete('/delete/post/{article}', [PostsController::class, 'destroy'])->name('post.destroy');

//social media
Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social_media.index');
Route::get('/social-media/create', [SocialMediaController::class, 'create'])->name('social_media.create');
Route::get('/social-media/edit/{social_media}', [SocialMediaController::class, 'edit'])->name('social_media.edit');
Route::post('/social-media/store', [SocialMediaController::class, 'store'])->name('social_media.store');
Route::put('/social-media/update/{social_media}', [SocialMediaController::class, 'update'])->name('social_media.update');
Route::delete('/social_media/delete/{social_media}', [SocialMediaController::class, 'destroy'])->name('social_media.destroy');

//setting
Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/setting/create', [SettingController::class, 'create'])->name('setting.create');
Route::get('/setting/edit/{setting}', [SettingController::class, 'edit'])->name('setting.edit');
Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
Route::put('/setting/update', [SettingController::class, 'update'])->name('setting.update');
Route::delete('/setting/delete/{setting}', [SettingController::class, 'destroy'])->name('setting.destroy');

//Article details
Route::get('/article-details/{slug}', [DetailsArticleController::class, 'index'])->name('article.details');
Route::get('/article/{slug}/load-more', [DetailsArticleController::class, 'loadMoreComments'])->name('article.loadMore');


//category by article
Route::get('/category-by-article/{slug}', [CategoryByArticle::class, 'index'])->name('category_by.article');

//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

//commentaire d'un simple utilisateur
Route::post('/comment/{id}', [DetailsArticleController::class, 'comment'])->name('comment');
Route::post('/reply/{commentId}', [DetailsArticleController::class, 'reply'])->name('reply');


//search
Route::post('/search', [SearchController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
