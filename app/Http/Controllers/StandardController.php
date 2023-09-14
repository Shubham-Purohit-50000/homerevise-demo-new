<?php

namespace App\Http\Controllers;

use App\Models\Medium;
use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function index()
    {
        $standards = Standard::with('medium')->get();
        return view('standards.index', compact('standards'));
    }

    public function create()
    {
        $mediums = Medium::all();
        return view('standards.create', compact('mediums'));
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
        $mediums = Medium::all();
        return view('standards.edit', compact('standard'), compact('mediums'));
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

        return redirect()->route('standards.index')
            ->with('success', 'Standard deleted successfully');
    }
}
