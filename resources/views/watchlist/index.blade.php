<h1>Mijn watchlist</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@forelse($animes as $anime)
    <div>
        <h2>
            <a href="{{ route('animes.show', $anime) }}">
                {{ $anime->title }}
            </a>
        </h2>

        <form method="POST" action="{{ route('watchlist.update', $anime) }}">
            @csrf
            @method('PATCH')

            <div>
                <label for="status-{{ $anime->id }}">Status</label>

                <select
                    id="status-{{ $anime->id }}"
                    name="status"
                    required
                >
                    <option value="plan_to_watch" @selected($anime->pivot->status === 'plan_to_watch')}>
                        Plan to watch
                    </option>

                    <option value="watching" @selected($anime->pivot->status === 'watching')}>
                        Watching
                    </option>

                    <option value="completed" @selected($anime->pivot->status === 'completed')}>
                        Completed
                    </option>

                    <option value="dropped" @selected($anime->pivot->status === 'dropped')}>
                        Dropped
                    </option>
                </select>
            </div>

            <div>
                <label for="episodes-{{ $anime->id }}">
                    Bekeken afleveringen
                </label>

                <input
                    id="episodes-{{ $anime->id }}"
                    type="number"
                    name="episodes_watched"
                    min="0"
                    @if($anime->episodes)
                        max="{{ $anime->episodes }}"
                    @endif
                    value="{{ old('episodes_watched', $anime->pivot->episodes_watched) }}"
                    required
                >
            </div>

            <div>
                <label for="rating-{{ $anime->id }}">Score</label>

                <input
                    id="rating-{{ $anime->id }}"
                    type="number"
                    name="rating"
                    min="1"
                    max="10"
                    value="{{ old('rating', $anime->pivot->rating) }}"
                >
            </div>

            <button type="submit">
                Opslaan
            </button>
        </form>

        <form method="POST" action="{{ route('watchlist.destroy', $anime) }}">
            @csrf
            @method('DELETE')

            <button type="submit">
                Verwijderen
            </button>
        </form>
    </div>

    <hr>
@empty
    <p>Je watchlist is nog leeg.</p>
@endforelse
