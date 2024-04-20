<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follwer = Auth::user();
        //dd($follwer->followings());
        $follwer->followings()->attach($user->id);

        return redirect()->route("users.show", $user->id)->with("success", "followed successfully");
    }

    public function unfollow(User $user)
    {
        $follwer = auth()->user();

        $follwer->followings()->detach($user);

        return redirect()->route("users.show", $user->id)->with("danger", "unfollowed successfully");
    }
}
