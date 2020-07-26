<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Display a listing of blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        return view('home.home', compact('posts', 'tags'));
    }

    /**
     * Display a tag filtered listing of blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterByTag(string $tagUrl)
    {
        $tag = Tag::where('url', $tagUrl)->firstOrFail();
        $posts = $tag ? $tag->posts : [];
        $title = __('Blog entries labelled by :tag', ['tag' => $tag->name]);
        $tags = Tag::all();
        return view('home.home', compact('posts', 'tag', 'tags', 'title'));
    }

    /**
     * Display blog post by url.
     *
     * @return \Illuminate\Http\Response
     */
    public function readPost(string $postUrl)
    {
        $post = Post::where('url', $postUrl)->firstOrFail();
        return view('home.homePost', compact('post'));
    }
}
