<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subtopic;
use Illuminate\Http\Request;

class SubtopicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request
        $query = Subtopic::with('topic');

        if (!empty($search)) {
            $query->where('heading', 'like', '%' . $search . '%');
        }

        $subtopics = $query->paginate(10); // 10 chapters per page

        return view('subtopics.index', compact('subtopics', 'search'));
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
            'primary_key' => 'required|string|max:250',
            'secondary_key' => 'required|string|max:250',
            'file_name' => 'required|string|max:250',
            'folder_name' => 'nullable|string|max:255',
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
            'primary_key' => 'required|string|max:250',
            'secondary_key' => 'required|string|max:250',
            'file_name' => 'required|string|max:250',
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
