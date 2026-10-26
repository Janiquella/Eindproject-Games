<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index()
    {
        $game = new Game();

        $game->title = 'Stardew Valey';
        $game->genre = 'Indie';

        return view('games.index', compact('game'));
    }

    public function show(string $id)
    {
        return view('games.show/{$id}', ['name' => 'Boo']);
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
        return redirect()->route('games.index');
    }

}
