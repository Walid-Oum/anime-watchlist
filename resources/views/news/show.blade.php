<article>
    <h1>{{ $newsItem->title }}</h1>

    <p>{{ $newsItem->published_at->format('d/m/Y') }}</p>

    @if($newsItem->image)
        <img
            src="{{ asset('storage/' . $newsItem->image) }}"
            alt="{{ $newsItem->title }}"
            width="300"
        >
    @endif

    <p>{{ $newsItem->content }}</p>
</article>
