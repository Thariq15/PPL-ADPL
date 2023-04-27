<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
            "title" => "judul pertama",
            "slug" => "judul-post-pertama",
            "author" => "Thariq Aziz",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum possimus porro eos unde, asperiores odio, natus non perferendis ex tempora ea nemo suscipit veniam ducimus repudiandae, libero accusamus maxime minima."
        ],
        [
            "title" => "judul Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Nando Oktavian",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum possimus porro eos unde, asperiores odio, natus non perferendis ex tempora ea nemo suscipit veniam ducimus repudiandae, libero accusamus maxime minima."
        ]
    ];

    public static function all() {
        return collect(self::$blog_post);
    }

    public static function find($slug)
        {
            $posts = static::all(); 
            return $posts->firstWhere('slug', $slug);
        }
}
