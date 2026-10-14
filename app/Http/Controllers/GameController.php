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
}
