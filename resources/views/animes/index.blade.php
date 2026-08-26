<h1>Anime</h1>

@foreach($animes as $anime)
    <div>
        <h2>
            <a href="{{ route('animes.show', $anime) }}">
                {{ $anime->title }}
            </a>
        </h2>

        @if($anime->release_year)
            <p>{{ $anime->release_year }}</p>
        @endif
    </div>
@endforeach
