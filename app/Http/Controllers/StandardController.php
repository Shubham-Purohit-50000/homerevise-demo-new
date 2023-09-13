<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function index()
    {
        $mediums = Standard::with('medium')->get();
        return view('standards.index', compact('standards'));
    }

    public function create()
    {
        return view('standards.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'medium_id' => 'required|exists:mediums,id',
        ]);

        Standard::create($validatedData);

        return redirect()->route('standards.index')
            ->with('success', 'Standard created successfully');
    }

    public function edit(Standard $standard)
    {
        return view('mediums.edit', compact('standard'));
    }

    public function update(Request $request, Standard $standard)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'medium_id' => 'required|exists:mediums,id',
        ]);

        $standard->update($validatedData);

        return redirect()->route('standards.index')
            ->with('success', 'Standard updated successfully');
    }

    public function destroy(Medium $medium)
    {
        $medium->delete();

        return redirect()->route('mediums.index')
            ->with('success', 'Medium deleted successfully');
    }
}
