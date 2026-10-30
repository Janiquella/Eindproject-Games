<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    //
    public function index()
    {
        $genres = Genre::all();
        return view('games.index', ['games' => Game::all(), 'genres' => $genres]);
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function create()
    {
        //Een leeg form laten zien
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'genre' => 'required'
        ]);

        $game = new Game();
        $game->title = $request->input('name');
        $game->description = $request->input('description');
        $game->genre_id = $request->input('genre');
        $game->user_id = auth()->id();
        $image = $request->file('image')->storePublicly('images', 'public');
        $game->image = $image; //to store the link to the image in the DB

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
        if ($game->user_id != auth()->id()) {
            abort(403);
        }
        $game->delete();
        return redirect('games');
    }

    public function edit(Game $game)
    {
        if ($game->user_id != auth()->id()) {
            abort(403);
        }
        $genres = Genre::all();
        return view('games.edit', compact('game', 'genres'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $game->title = $validated['name'];
        $game->description = $validated['description'];
        $game->genre_id = $validated['genre'];


        if ($request->hasFile('image')) {
            if ($game->image && Storage::disk('public')->exists($game->image)) {
                Storage::disk('public')->delete($game->image);
            }
            $game->image = $request->file('image')->store('images', 'public');
        }

        $game->save();

        return redirect()->route('games.show', $game);
    }

//    public function search(Request $request)
//    {
//        $filters = $request->validate([
//            'search' => ['nullable', 'string'],
//            'genre' => ['nullable', 'integer', 'exists:genres,id']
//        ]);
//
//        $query = Game::query()->with(['genre']);
////        $query->where('hidden', false);
//        $query->when($filters['search'] ?? null, function ($query, $search) {
//            $query->where('name', 'like', "%{$search}%");
//        });
//        $query->when($filters['genre'] ?? null, function ($query, $genre) {
//            $query->where('genre_id', $genre);
//        });
//
//
//        $search = $request->input('search');
//        $games = Game::where('title', 'LIKE', "%{$search}%")->get();
//        return view('games.index', ['games' => $games, 'genres' => Genre::all()]);
//    }

    public function search(Request $request)
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string'],
            'genre' => ['nullable', 'integer', 'exists:genres,id'],
        ]);

        $query = Game::query()->with('genre');

        if (!empty($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['genre'])) {
            $query->where('genre_id', $filters['genre']);
        }

        $games = $query->get();

        return view('games.index', [
            'games' => $games,
            'genres' => Genre::all(),
        ]);
    }

}

