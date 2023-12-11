<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;

    public static function factory(): CategoryFactory
    {
        return new CategoryFactory();
    }

    public function posts(): HasMany
    {
        return $this->HasMany(Post::class);
    }
}
