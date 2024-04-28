<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = Idea::where('user_id', $user->id)->paginate(5);
        return view("users.show", compact("user", "ideas"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize("update", $user);
        // if ($user->id != auth()->id()) {
        //     return redirect('/')->with('danger', 'not allowed');
        // }
        $ideas = $user->ideas()->paginate(5);
        return view("users.edit", compact("user", "ideas"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize("update", $user);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['img'] = $imagePath;

            // Storage::disk('public')->delete($user->img);
        }
        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}