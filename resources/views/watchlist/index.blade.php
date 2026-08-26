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

        <p>Status: {{ $anime->pivot->status }}</p>

        <form method="POST" action="{{ route('watchlist.destroy', $anime) }}">
            @csrf
            @method('DELETE')

            <button type="submit">
                Verwijderen
            </button>
        </form>
    </div>
@empty
    <p>Je watchlist is nog leeg.</p>
@endforelse

