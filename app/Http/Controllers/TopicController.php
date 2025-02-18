<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Topic::with('chapter');

        if (!empty($search)) {
            $query->where('heading', 'like', '%' . $search . '%');
        }

        $topics = $query->paginate(10)->appends(['search' => $search]);

        return view('topics.index', compact('topics', 'search'));
    }


    public function create()
    {
        $chapters = Chapter::all();
        return view('topics.create', compact('chapters'));
    }

    public function store(Request $request)
    {
        if($request->file('add_file')){
            $file = $request->file('add_file');
            $path = $file->store('uploads/file', 'public');
        
            $url = asset('storage/' . $path);  
    
            $request->merge(['fileUrl' => $url]);
        }
        $validatedData = $request->validate([
            'heading' => 'required',
            'body' => 'required',
            'chapter_id' => 'required|exists:chapters,id',
            'primary_key' => 'required|string|max:250',
            'secondary_key' => 'required|string|max:250',
            'file_name' => 'required|string|max:250',
            'folder_name' => 'nullable|string|max:255',
            'fileUrl' => 'nullable|string|max:255',
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
        if($request->file('add_file')){
            $file = $request->file('add_file');
            $path = $file->store('uploads/file', 'public');
        
            $url = asset('storage/' . $path);  
    
            $request->merge(['fileUrl' => $url]);
        } 
        $validatedData = $request->validate([
            'heading' => 'required',
            'body' => 'required',
            'chapter_id' => 'required|exists:chapters,id',
            'primary_key' => 'required|string|max:250',
            'secondary_key' => 'required|string|max:250',
            'file_name' => 'required|string|max:250',
            'fileUrl' => 'nullable|string|max:255',
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
