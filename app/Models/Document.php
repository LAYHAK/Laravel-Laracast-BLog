<?php

namespace App\Models;

use Exception;
use File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Document
{
    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug)
    {
    }

    /**
     * @throws Exception
     */
    public static function findOrFail($slug)
    {
        return static::find($slug) ?? throw new ModelNotFoundException();
    }

    private static function find($slug)
    {
        return self::getPost($slug);
    }

    private static function getPost($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function all(): Collection
    {

        /*                return array_map(function ($file) {

                            $document = YamlFrontMatter::parseFile($file);

                            return new Post(
                                $document->title,
                                $document->excerpt,
                                $document->date,
                                $document->body(),
                                $document->slug
                            );
                        }, $files);
        */
        return cache()->rememberForever('posts.all', fn () => static::getPosts());
    }

    private static function getPosts()
    {

        return collect(File::files(resource_path('posts/')))->map(fn ($file) => YamlFrontMatter::parseFile($file)
        )->map(fn ($document) => new static(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        )
        )->sortByDesc('date');
    }
}
