<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index()
    {
        return view('games.index', ['games' => Game::all()]);
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function create()
    {
        //Een leeg form laten zien
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'genre' => 'required|min:3'
        ]);

        $game = new Game();
        $game->title = $request->input('name');
        $game->description = $request->input('description');
        $game->genre = $request->input('genre');
        $game->image = 'temp';

        $game->save();

        return redirect()->route('games.index');

        //info uit form halen / Request $request /
        //checken op SQL-injections / hoeft niet? /
        //validatie op de data
        //error handling
        //info in database zetten
        //redirect naar games.index
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect('games');
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'genre' => 'required|min:3'
        ]);

        $game->title = $validated['name'];
        $game->description = $validated['description'];
        $game->genre = $validated['genre'];

        $game->save();

        return redirect()->route('games.show', $game);
    }

}
