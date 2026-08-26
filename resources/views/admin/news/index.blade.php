<h1>Nieuwsbeheer</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('admin.news.create') }}">
    Nieuw nieuwsitem
</a>

@forelse($newsItems as $newsItem)
    <article>
        <h2>{{ $newsItem->title }}</h2>

        <p>{{ $newsItem->published_at->format('d/m/Y') }}</p>

        <a href="{{ route('admin.news.edit', $newsItem) }}">
            Bewerken
        </a>

        <form method="POST"
              action="{{ route('admin.news.destroy', $newsItem) }}">
            @csrf
            @method('DELETE')

            <button type="submit">
                Verwijderen
            </button>
        </form>
    </article>

    <hr>
@empty
    <p>Er zijn nog geen nieuwsitems.</p>
@endforelse
