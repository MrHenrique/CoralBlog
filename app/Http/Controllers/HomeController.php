<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::limit(5)->with(['user', 'comments'])->orderby('id', 'desc')->get();
        return view('home', ['title' => 'Página Inicial', 'posts' => $posts]);
    }
}
