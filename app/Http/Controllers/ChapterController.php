<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request
        $query = Chapter::with('subject');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $chapters = $query->paginate(10)->appends(['search' => $search]); // 10 chapters per page

        return view('chapters.index', compact('chapters', 'search'));
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
            'folder_name' => 'required|string|max:255',
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
