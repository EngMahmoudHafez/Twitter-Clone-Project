<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function index()
    {
        // idea::factory()->create([
        //     'content' => 'hi Mahmoud'
        // ]);

        $ideas = idea::latest()->paginate(4);
        return view('layout.layout', ['ideas' => $ideas]);
    }
    public function stroe()
    {
        $att = request()->validate([
            'content' => 'required'
        ]);
        if (!$att) {
            return redirect('/')->with('danger', 'idea cerated successfully');
        }
        idea::create($att);
        return redirect('/')->with('success', 'idea cerated successfully');
    }

    public function destroy(idea $idea)
    {

        $idea->delete();

        return redirect('/')->with('success', 'deleted successfully');
    }

    public function show(idea $idea)
    {

        return view('ideas.show', ['idea' => $idea]);
    }
}
