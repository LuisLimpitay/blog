<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        dd($posts);
        //return view('admin.posts.index', compact('posts', 'user'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //salvar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //image
        if ($request->file('file')) {
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        //retornar
        return back()->with('status', 'Creado con éxito');
    }

    public function show($id)
    {
        //
    }

    
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact('post'));
    }

    
    public function update(Request $request, Post $post)
    {
        // edito solo esos campos si no viene file
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'iframe' => $request->iframe
        ]);
        // si viene con file
        if ($request->file('file')) {
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        return back()->with('status', 'Post actualizado con exito');
    }

   
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('status', 'Eliminado con exito');
    }
    
}
