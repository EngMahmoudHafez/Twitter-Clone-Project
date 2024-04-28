<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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


        return view("admin.dashboard");
    }
}
