<h1>Nieuwsitem bewerken</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST"
      action="{{ route('admin.news.update', $newsItem) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div>
        <label for="title">Titel</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $newsItem->title) }}"
            required
        >
    </div>

    <div>
        <label for="published_at">Publicatiedatum</label>
        <input
            type="date"
            id="published_at"
            name="published_at"
            value="{{ old('published_at', $newsItem->published_at->format('Y-m-d')) }}"
            required
        >
    </div>

    <div>
        <label for="image">Nieuwe afbeelding</label>
        <input
            type="file"
            id="image"
            name="image"
            accept="image/png,image/jpeg,image/webp"
        >
    </div>

    @if($newsItem->image)
        <p>Huidige afbeelding:</p>
        <img
            src="{{ asset('storage/' . $newsItem->image) }}"
            alt="{{ $newsItem->title }}"
            width="200"
        >
    @endif

    <div>
        <label for="content">Inhoud</label>
        <textarea
            id="content"
            name="content"
            rows="8"
            required
        >{{ old('content', $newsItem->content) }}</textarea>
    </div>

    <button type="submit">
        Wijzigingen opslaan
    </button>
</form>
