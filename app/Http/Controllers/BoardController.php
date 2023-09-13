<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    // app/Http/Controllers/BoardController.php

    public function index()
    {
        $boards = Board::all();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'state_id' => 'required|exists:states,id',
        ]);

        Board::create($validatedData);

        return redirect()->route('boards.index');
    }

    public function edit(Board $board)
    {
        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'state_id' => 'required|exists:states,id',
        ]);

        $board->update($validatedData);

        return redirect()->route('boards.index');
    }

    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('boards.index');
    }

}
