<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

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
            $posts[] = $value->getContents();
        }

        return $posts;
    }
}