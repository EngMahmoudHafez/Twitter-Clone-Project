<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy("created_at", "desc")->paginate(10);
        return view("admin.comments.index", compact("comments"));
    }

    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with("success", "deleted ");
    }
}
