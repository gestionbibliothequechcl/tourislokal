<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Article;

class Category extends Model
{
    //
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'sub_category',
        'slug',
        'description',
        'isActive'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
