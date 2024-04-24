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
        $ideas = Idea::orderBy('created_at', 'DESC');
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
        $att['user_id'] = auth()->id();
        idea::create($att);
        return redirect('/')->with('success', 'idea cerated successfully');
    }

    public function destroy(idea $idea)
    {
        //dd($this->IsOwner($idea->user_id));
        if (!$this->IsOwner($idea->user_id)) {
            return redirect('/')->with('danger', 'not allowed');
        }
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
        if (!$this->IsOwner($idea->user_id)) {
            return redirect('/')->with('danger', 'not allowed');
        }
        $editing = true;

        return view('ideas.show', ['idea' => $idea, 'editing' => $editing]);
    }
    public function update(Idea $idea)
    {
        if (!$this->IsOwner($idea->user_id)) {
            return redirect('/')->with('danger', 'not allowed');
        }
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

    public function IsOwner($user_id)
    {
        if (auth()->id() == $user_id)
            return true;
        return false;
    }
}
