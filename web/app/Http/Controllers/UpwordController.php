<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upword;
use Illuminate\Support\Facades\Auth;

class UpwordController extends Controller
{
    // Show the form to create a new project
    public function create()
    {
        return view('upwords.create');
    }

    // Store the new project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Upword::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            // status is omitted, so it defaults to 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Project created!');
    }

    // Optionally: list user's upwords (if needed later)
    public function index()
    {
        $upwords = auth()->user()->upwords()->orderBy('created_at')->get();
        return view('upwords.index', compact('upwords'));
    }

    public function destroy(\App\Models\Upword $upword)
    {
        // Optional: Make sure the authenticated user owns this upword
        if ($upword->user_id !== auth()->id()) {
            abort(403);
        }

        $upword->delete();

        return redirect()->back()->with('success', 'Project deleted.');
    }

    public function show(\App\Models\Upword $upword)
    {
        // Optional: Ensure the user owns the project
        if ($upword->user_id !== auth()->id()) {
            abort(403);
        }

        return view('upwords.show', compact('upword'));
    }

    public function edit(\App\Models\Upword $upword)
    {
        if ($upword->user_id !== auth()->id()) {
            abort(403);
        }

        return view('upwords.edit', compact('upword'));
    }

    public function update(Request $request, \App\Models\Upword $upword)
    {
        if ($upword->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:submitted,pending,editing,completed',
        ]);

        $upword->update($request->only(['title', 'description', 'status']));

        return redirect()->route('upwords.show', $upword->id)->with('success', 'Project updated.');
    }
}
