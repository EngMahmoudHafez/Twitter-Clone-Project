<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

        $ideas = Idea::with('comments')->orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            //dd(request()->has('search'));
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        }
        $ideas = $ideas->paginate(4);
        return view('ideas.index', ['ideas' => $ideas]);
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

        $editing = False;

        return view('ideas.show', ['idea' => $idea, 'editing' => $editing]);
    }

    public function edit(idea $idea)
    {
        $editing = true;

        return view('ideas.show', ['idea' => $idea, 'editing' => $editing]);
    }
    public function update(Idea $idea)
    {
        $att = request()->validate([
            'content' => 'required'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();
        // if (!$att) {
        //     return redirect('/')->with('danger', 'idea cerated successfully');
        // }
        // idea::create($att);
        return redirect('/ideas/' . $idea->id)->with('success', 'idea updated successfully');
    }
}
