<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        // $this->authorize("admin");    //the same work
        if (Gate::denies('admin')) {
            abort(403);
        }
        $totalusers = User::count();
        $totalideas = idea::count();
        $totalcomments = Comment::count();

        return view("admin.dashboard", compact("totalusers", "totalideas", "totalcomments"));
    }
}
