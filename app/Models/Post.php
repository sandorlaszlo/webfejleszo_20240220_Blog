<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $slug;
    public $date;
    public $body;

    public function __construct($title, $slug, $date, $body) {
        $this->title = $title;
        $this->slug = $slug;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all(){
        $files = File::allFiles(resource_path('posts'));

        $posts = [];
        foreach ($files as $key => $value) {
            // $posts[] = $value->getContents();
            $object = YamlFrontMatter::parse($value->getContents());

            $post = new Post($object->title, $object->slug, $object->date, $object->body());
            $posts[] = $post;
        }

        return $posts;
    }

    public static function find($slug){
        $posts = static::all();

        foreach ($posts as $key => $value) {
            if ($value->slug == $slug){
                return $value;
            }
        }

        return new ModelNotFoundException();
    }
}