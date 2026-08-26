<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function index(Request $request)
    {
        $animes = $request->user()
            ->animes()
            ->orderBy('title')
            ->get();

        return view('watchlist.index', [
            'animes' => $animes,
        ]);
    }

    public function store(Request $request, Anime $anime)
    {
        $request->user()->animes()->syncWithoutDetaching([
            $anime->id => [
                'status' => 'plan_to_watch',
                'episodes_watched' => 0,
            ],
        ]);

        return redirect()
            ->route('watchlist.index')
            ->with('success', 'Anime toegevoegd aan je watchlist.');
    }

    public function destroy(Request $request, Anime $anime)
    {
        $request->user()->animes()->detach($anime->id);

        return redirect()
            ->route('watchlist.index')
            ->with('success', 'Anime verwijderd uit je watchlist.');
    }


    public function update(Request $request, Anime $anime)
    {
        $validated = $request->validate([
            'status' => 'required|in:plan_to_watch,watching,completed,dropped',
            'rating' => 'nullable|integer|min:1|max:10',
            'episodes_watched' => 'required|integer|min:0',
        ]);


        $request->user()->animes()->updateExistingPivot($anime->id, $validated);

        return redirect()
            ->route('watchlist.index')
            ->with('success', 'Watchlist bijgewerkt.');
    }
}
