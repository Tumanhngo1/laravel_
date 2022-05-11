<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return view('users.home.posts',[
            'posts' => Post::latest()->filter(request(['search','category','author']))
            ->paginate(10)->withQueryString()
        ]);
    }

    public function show($slug){
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->increment('post_view');
        $popular = Post::orderByDesc('post_view')->take(3)->get();
        return view('users.home.post',[
            'post' => $post,
            'populars' => $popular
        ]);
    }
}
