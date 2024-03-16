<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function index()
    {
        // idea::factory()->create();

        $ideas = idea::all();
        return view('layout.layout', ['ideas' => $ideas]);
    }
}
