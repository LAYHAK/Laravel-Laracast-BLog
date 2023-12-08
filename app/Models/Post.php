<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'published_at', 'category_id'];

    protected $with = ['category', 'author'];

    public function getRouteKeyName(): string
    {
        //? use this when the route parameter doesn't include {param:fieldName}
        return 'slug'; // TODO: Change the autogenerated stub
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); // TODO: Change the autogenerated stub
    }
}