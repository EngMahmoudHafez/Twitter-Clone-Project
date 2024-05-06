<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->whereNot('is_admin', 1)->paginate(10);
        return view("admin.users.index", compact("users"));
    }
}
