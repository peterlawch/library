<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

    public  function getIndex() {
        return view('pages.welcome');
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getContact() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.contact')->withPosts($posts);
    }

}