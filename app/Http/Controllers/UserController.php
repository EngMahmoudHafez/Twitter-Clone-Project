<?php

namespace App\Http\Controllers;

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
        $ideas = $user->ideas()->paginate(5);
        return view("users.show", compact("user", "ideas"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if ($user->id != auth()->id()) {
            abort(405);
        }
        $ideas = $user->ideas()->paginate(5);
        return view("users.edit", compact("user", "ideas"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            "name" => 'required|alpha',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image'
        ]);

        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['img'] = $imagePath;

            Storage::disk('public')->delete($user->img);
        }
        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
