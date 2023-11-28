<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'excerpt', 'slug'];

    protected $with = ['category', 'author'];

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function (Builder $query, $search) {
            $query->where(fn($query) => $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, fn(Builder $query, $slug) => $query
            ->whereRelation('category', 'slug', $slug)
        );

        $query->when($filters['author'] ?? false, fn(Builder $query, $username) => $query
            ->whereRelation('author', 'username', $username)
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
