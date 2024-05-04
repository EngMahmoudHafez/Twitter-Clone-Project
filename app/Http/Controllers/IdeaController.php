<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Models\Comment;
use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            //dd(request()->has('search'));
            $ideas = $ideas->Search(request('search', ''));
        }
        $ideas = $ideas->paginate(4);
        // $topUsers = $this->follow()->limit(5);
        // dd($topUsers);
        return view('ideas.index', [
            'ideas' => $ideas,

        ]);
    }
    public function follow()
    {
        return User::withCount('ideas')
            ->orderBy('ideas_count', 'DESC')->get();
    }
    public function stroe(CreateIdeaRequest $request)
    {
        $att = $request->validated();


        if (!$att) {
            return redirect('/')->with('danger', 'idea cerated successfully');
        }
        $att['user_id'] = auth()->id();
        idea::create($att);
        return redirect('/')->with('success', 'idea cerated successfully');
    }

    public function destroy(idea $idea)
    {
        $this->authorize('delete', $idea);

        //dd($this->IsOwner($idea->user_id));
        // if (!$this->IsOwner($idea->user_id)) {
        //     return redirect('/')->with('danger', 'not allowed');
        // }
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
        $this->authorize('update', $idea);

        // if (!$this->IsOwner($idea->user_id)) {
        //     return redirect('/')->with('danger', 'not allowed');
        // }
        $editing = true;

        return view('ideas.show', ['idea' => $idea, 'editing' => $editing]);
    }
    public function update(Idea $idea)
    {
        $this->authorize('update', $idea);
        // if (!$this->IsOwner($idea->user_id)) {
        //     return redirect('/')->with('danger', 'not allowed');
        // }
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
