<?php

namespace App\Http\Controllers;

use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::orderBy('title')->get();

        return view('animes.index', [
            'animes' => $animes,
        ]);
    }

    public function show(Anime $anime)
    {
        return view('animes.show', [
            'anime' => $anime,
        ]);
    }
}
