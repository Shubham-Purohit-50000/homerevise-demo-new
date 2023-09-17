<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with('chapter')->get();
        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        $chapters = Chapter::all();
        return view('topics.create', compact('chapters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'body' => 'required',
            'chapter_id' => 'required|exists:chapters,id',
            'primary_key' => 'required|string|max:250',
            'secondary_key' => 'required|string|max:250',
            'file_name' => 'required|string|max:250',
            'folder_name' => 'nullable|string|max:255',
        ]);

        Topic::create($validatedData);

        return redirect()->route('topics.index')
            ->with('success', 'Topic created successfully');
    }

    public function edit(Topic $topic)
    {
        $chapters = Chapter::all();
        return view('topics.edit', compact('topic'), compact('chapters'));
    }

    public function update(Request $request, Topic $topic)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'body' => 'required',
            'chapter_id' => 'required|exists:chapters,id',
            'primary_key' => 'required|string|max:250',
            'secondary_key' => 'required|string|max:250',
            'file_name' => 'required|string|max:250',
        ]);

        $topic->update($validatedData);

        return redirect()->route('topics.index')
            ->with('success', 'Topic updated successfully');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')
            ->with('success', 'Topic deleted successfully');
    }
}
