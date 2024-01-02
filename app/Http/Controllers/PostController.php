<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::All();
        return view('posts.index', ['posts' => $posts]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
    public function create()
    {
        $users = User::All();
        return view('posts.create', ['users' => $users]);
    }
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $submittedData = request()->all();
        Post::create([
            'title' => $submittedData['title'],
            'description' => $submittedData['description'],
            'user_id' => $submittedData['user_id'],
        ]);
        return to_route('posts.index');
    }
    public function edit(Post $post)
    {
        $users = User::All();
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }
    public function update(Post $post)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $submittedData = request()->all();
        $post->update([
            'title' => $submittedData['title'],
            'description' => $submittedData['description'],
            'user_id' => $submittedData['user_id'],
        ]);
        return to_route('posts.show', $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
