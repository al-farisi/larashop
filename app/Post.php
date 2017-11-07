<?php

namespace App;

use DB;

class Post extends BaseModel {

    protected $fillable = array('url', 'title', 'description', 'content', 'image', 'blog', 'category_id');

    public static function prevBlogPostUrl($id) {
        $blog = DB::table('posts')
                ->orderBy('id', 'desc')
                ->skip(0)
                ->take(1)
                ->where('id', '<', $id)
                ->get();

        $url = '#';

        if (count($blog) > 0) {
            $url = $blog[0]->url;
        }

        return $url;
    }

    public static function nextBlogPostUrl($id) {
        $blog = DB::table('posts')
                ->orderBy('id', 'asc')
                ->skip(0)
                ->take(1)
                ->where('id', '>', $id)
                ->get();

        $url = '#';

        if (count($blog) > 0) {
            $url = $blog[0]->url;
        }

        return $url;
    }
}