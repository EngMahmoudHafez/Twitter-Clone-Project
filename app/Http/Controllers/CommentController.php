<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\idea;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->idea_id = $idea->id;
        $comment->content = request('content');
        $comment->save();

        return redirect('/ideas/' . $idea->id)->with('success', "comment posted successfully");
    }
}
