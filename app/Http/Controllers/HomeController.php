<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home (){
        $posts = Post::with('user')->paginate(8);
        //dd($posts);
        return view('home', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
        //dd($post);
    }
    
}
