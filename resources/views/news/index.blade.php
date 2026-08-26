<h1>Laatste nieuwtjes</h1>

@forelse($newsItems as $newsItem)
    <article>
        <h2>
            <a href="{{ route('news.show', $newsItem) }}">
                {{ $newsItem->title }}
            </a>
        </h2>

        <p>{{ $newsItem->published_at->format('d/m/Y') }}</p>
    </article>
@empty
    <p>Er zijn nog geen nieuwsitems.</p>
@endforelse
