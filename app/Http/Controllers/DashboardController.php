<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function feed()
    {
        $user = auth()->user();
        $followingIDs = $user->followings()->pluck("user_id");
        $ideas = idea::whereIn('user_id', $followingIDs)->latest();
        if (request()->has('search')) {
            $ideas = $ideas->Search(request('search', ''));
        }
        $ideas = $ideas->paginate(4);
        return view('ideas.index', ['ideas' => $ideas]);
    }
}