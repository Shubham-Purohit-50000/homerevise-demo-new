<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::with('subject')->get();
        return view('chapters.index', compact('chapters'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('chapters.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Chapter::create($validatedData);

        return redirect()->route('chapters.index')
            ->with('success', 'Chapter created successfully');
    }

    public function edit(Chapter $chapter)
    {
        $subjects = Subject::all();
        return view('chapters.edit', compact('chapter'), compact('subjects'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $chapter->update($validatedData);

        return redirect()->route('chapters.index')
            ->with('success', 'Chapter updated successfully');
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->route('chapters.index')
            ->with('success', 'Chapter deleted successfully');
    }
}
