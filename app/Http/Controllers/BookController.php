<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BookController extends Controller
{
    //
    public function getIndex() {
        $posts = POST::paginate(2);

        return view('manage.book.index')->withPosts($posts);
    }


    public function getSingle($slug) {
        // fetcg frin tge DB based on slug
        $post = POST::where('slug', '=', $slug)->first();

        // return the view and pass in the post object
        return view('manage.book.single')->withPost($post);
    }
}
