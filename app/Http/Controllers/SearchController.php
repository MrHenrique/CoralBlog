<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::search($request->input('s'));
        return view('search', ['title' => 'Pesquisa', 'posts' => $posts]);
    }
}
