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
}
