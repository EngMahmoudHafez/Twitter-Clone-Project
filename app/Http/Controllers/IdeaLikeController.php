<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->attach($idea->id);
        return redirect()->route('dashboard')->with("success", "Liked successfully");
    }

    public function unlike(idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->detach($idea->id);
        return redirect()->route('dashboard')->with("danger", "UnLiked successfully");
    }
}
