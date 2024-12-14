<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Conner\Tagging\Taggable;

class Article extends Model
{
    //
    use HasFactory, HasSlug, Taggable;
    
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'isActive',
        'isComment',
        'isShare',
        'category_id',
        'author_id'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function imageUrl(): string
    {
        return Storage::url($this->image);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}
