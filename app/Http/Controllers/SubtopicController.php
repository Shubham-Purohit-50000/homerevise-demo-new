<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subtopic;
use Illuminate\Http\Request;

class SubtopicController extends Controller
{
    public function index()
    {
        $subtopics = Subtopic::with('topic')->get();
        return view('subtopics.index', compact('subtopics'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('subtopics.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'body' => 'required',
            'topic_id' => 'required|exists:topics,id',
        ]);

        Subtopic::create($validatedData);

        return redirect()->route('subtopics.index')
            ->with('success', 'SubTopic created successfully');
    }

    public function edit(Subtopic $subtopic)
    {
        $topics = Topic::all();
        return view('subtopics.edit', compact('subtopic'), compact('topics'));
    }

    public function update(Request $request, Subtopic $subtopic)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'body' => 'required',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $subtopic->update($validatedData);

        return redirect()->route('subtopics.index')
            ->with('success', 'SubTopic updated successfully');
    }

    public function destroy(Subtopic $subtopic)
    {
        $subtopic->delete();

        return redirect()->route('subtopics.index')
            ->with('success', 'SubTopic deleted successfully');
    }
}
