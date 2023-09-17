<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('standard')->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $standards = Standard::all();
        return view('subjects.create', compact('standards'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'folder_name' => 'required|string|max:255',
            'standard_id' => 'required|exists:standards,id',
        ]);

        Subject::create($validatedData);

        return redirect()->route('subjects.index')
            ->with('success', 'Subjects created successfully');
    }

    public function edit(Subject $subject)
    {
        $standards = Standard::all();
        return view('subjects.edit', compact('subject'), compact('standards'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'standard_id' => 'required|exists:standards,id',
        ]);

        $subject->update($validatedData);

        return redirect()->route('subjects.index')
            ->with('success', 'Subjects updated successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
}
