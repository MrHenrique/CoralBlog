<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate(['comment' => 'required']);
        $created = Comment::create([
            'comment' => $validated['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $request->input('post_id'),
        ]);
        if ($created) {
            return back();
        }
        return back()->with('error_create_comment', 'Ocorreu um erro ao cadastrar o comentário, tente novamente.');
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
