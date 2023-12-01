<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function showPosts($user_id){
        $posts = Post::where('user_id', $user_id)->get();
        $user = User::findOrFail($user_id);
        return view('posts.posts', compact('posts', 'user'));
    }

    public function create(){
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function addPost($user_id, Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'array|exists:tags,id'
        ]);

        $post = new Post();
        $post->user_id = $user_id;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();
        $post->tag()->attach($validatedData['tags']);

        return redirect('/users/'.$user_id.'/posts')->with('success', 'Post успешно добавлен');
    }

    public function showPost($user_id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $user = User::findOrFail($user_id);
        return view('posts.show', compact('post', 'user'));
    }

    public function edit($user_id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $tags = Tag::all();
        $selectedTags = Tag::searchByPost($post_id)->get();
        $user = User::findOrFail($user_id);
        return view('posts.edit', compact('user', 'post', 'tags', 'selectedTags'));
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

    public function showResources() {
        $posts = Post::withTrashed()->get();
        return PostResource::collection($posts);
    }
}
