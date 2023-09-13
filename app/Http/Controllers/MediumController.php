<?php

namespace App\Http\Controllers;

use App\Models\Medium;
use Illuminate\Http\Request;

class MediumController extends Controller
{
    public function index()
    {
        $mediums = Medium::with('board')->get();
        return view('mediums.index', compact('mediums'));
    }

    public function create()
    {
        return view('mediums.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ]);

        Medium::create($validatedData);

        return redirect()->route('mediums.index')
            ->with('success', 'Medium created successfully');
    }

    public function edit(Medium $medium)
    {
        return view('mediums.edit', compact('medium'));
    }

    public function update(Request $request, Medium $medium)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ]);

        $medium->update($validatedData);

        return redirect()->route('mediums.index')
            ->with('success', 'Medium updated successfully');
    }

    public function destroy(Medium $medium)
    {
        $medium->delete();

        return redirect()->route('mediums.index')
            ->with('success', 'Medium deleted successfully');
    }
}
