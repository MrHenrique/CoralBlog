<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post', ['post' => $post, 'title' => $post->title]);
    }
    public function newpost()
    {
        return view('newpost', ['title' => "Novo post"]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['title' => 'required', 'thumb' => 'required|image|mimes:jpeg,png,jpg,gif', 'content' => 'required']);
        $thumbPath = $request->file('thumb')->store('images/posts', 'public_html');
        $created = Post::create([
            'title' => $validated['title'],
            'thumb' => $thumbPath,
            'content' => $validated['content'],
            'slug' => Str::slug($validated['title']),
            'user_id' => auth()->user()->id,
        ]);
        if ($created) {
            return redirect()->route('home');
        }
        return back()->with('error_create_post', 'Ocorreu um erro ao cadastrar a postagem, tente novamente.');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->thumb) {
            Storage::disk('public')->delete($post->thumb);
        }
        $post->delete();
        return redirect()->route('home');
    }
}
