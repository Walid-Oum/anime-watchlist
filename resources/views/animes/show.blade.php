<h1>{{ $anime->title }}</h1>

@if($anime->cover_image)
    <img
        src="{{ asset('storage/' . $anime->cover_image) }}"
        alt="{{ $anime->title }}"
        width="200"
    >
@endif

@if($anime->release_year)
    <p>Jaar: {{ $anime->release_year }}</p>
@endif

@if($anime->episodes)
    <p>Afleveringen: {{ $anime->episodes }}</p>
@endif

@if($anime->description)
    <p>{{ $anime->description }}</p>
@endif
