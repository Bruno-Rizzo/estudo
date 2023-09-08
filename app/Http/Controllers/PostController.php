<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index()
    {
        $this->authorize('view',Post::class);
        $posts = Post::OrderByDesc('id')->latest()->take(5)->get();
        return view('admin.posts.index',compact('posts'));
    }

    public function search(Request $request)
    {
        if(!empty($request->title)){
            $posts = Post::where('title','like',"%$request->title%")->get();
        }elseif(!empty($request->author)){
            $posts = Post::where('author','like',"%$request->author%")->get();
        }else{
            $posts = Post::OrderByDesc('id')->latest()->take(5)->get();
        }
        return view('admin.posts.index',compact('posts'));
    }
    
    public function create()
    {
        $this->authorize('create',Post::class);
        return view('admin.posts.create');
    }

    
    public function store(PostStoreRequest $request)
    {
        $posts = $request->validated();
        $posts['author'] = Auth::user()->name;
        Post::create($posts);

        return to_route('posts.index')->with('info','Post cadastrado com sucesso');
    }

    
    public function show(Post $post)
    {
        //
    }

   
    public function edit(Post $post)
    {
        $this->authorize('update',Post::class);
        return view('admin.posts.edit',compact('post'));
    }

   
    public function update(PostUpdateRequest $request, Post $post)
    {
        $posts = $request->validated();
        $posts['author'] = Auth::user()->name;
        $post->update($posts);
        
        return to_route('posts.index')->with('info','Post editado com sucesso');;
    }

   
    public function destroy(Post $post)
    {
        $this->authorize('delete',Post::class);
        $post->delete();
        return to_route('posts.index')->with('error','Post excluído com sucesso');
    }

}
