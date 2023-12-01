<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showPosts(){
        $posts = Post::all();
        return view('posts.posts', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function addPost(Request $request){
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $post = new Post([
            'name' => $request->input('name')
        ]);

        $post = new Post();
        $post->name = $validatedData['name'];
        $post->save();

        return redirect('/posts')->with('success', 'Post успешно добавлен');
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->name = $validatedData['name'];
        $post->save();

        return redirect('/posts')->with('success', 'Post успешно обновлён');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post успешно удалён');
    }
}
