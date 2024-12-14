<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class CategoryController extends Controller implements HasMiddleware
{
    //

        public static function middleware(): array
    {
        return [
           
            new Middleware('permission:view categories', only: ['index']),
            new Middleware('permission:edit categories', only: ['edit']),
            new Middleware('permission:create categories', only: ['create']),
            new Middleware('permission:delete categories', only: ['destroy']),
          
        ];
    }

    public function index(){
        $categories = Category::all();
        return view('back.category.list', ['categories'=>$categories]);
    }

    public function create(){
        return view('back.category.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $dataValidate = $request->validated();
            Category::create($dataValidate);
    
            return redirect()->route('category.index')->with('success', 'Catégorie ajoutée avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l’ajout de la catégorie : ' . $e->getMessage());
        }
    }

    public function edit(Category $category){
        return view('back.category.create', ['category' => $category]);

    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $dataValidate = $request->validated();
        
        // Mise à jour de la catégorie
        $category->update([
            'name' => $dataValidate['name'],
            'description' => $dataValidate['description'],
            'slug' => $dataValidate['slug'],
            'isActive' => $dataValidate['isActive'],
        ]);
    
        // Mise à jour des sous-catégories
        $subCategories = $request->input('sub_category', []);
        
        // Associer les nouvelles sous-catégories
        $category->subCategories()->delete(); // Supprimer les anciennes sous-catégories
        foreach ($subCategories as $subCategory) {
            $category->subCategories()->create(['name' => $subCategory]); // Ajouter les nouvelles sous-catégories
        }
    
        return redirect()->route('category.index')->with('success', 'Catégorie modifiée avec succès !');
    }
    

    public function destroy(Category $category){

        $category->delete();

        return redirect()->back()->with('success', 'Category supprimer avec success !');
    }
    
}
