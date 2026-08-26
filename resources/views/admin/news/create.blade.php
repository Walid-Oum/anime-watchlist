<h1>Nieuwsitem toevoegen</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST"
      action="{{ route('admin.news.store') }}"
      enctype="multipart/form-data">

    @csrf

    <div>
        <label for="title">Titel</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            required
        >
    </div>

    <div>
        <label for="published_at">Publicatiedatum</label>
        <input
            type="date"
            id="published_at"
            name="published_at"
            value="{{ old('published_at') }}"
            required
        >
    </div>

    <div>
        <label for="image">Afbeelding</label>
        <input
            type="file"
            id="image"
            name="image"
            accept="image/png,image/jpeg,image/webp"
        >
    </div>

    <div>
        <label for="content">Inhoud</label>
        <textarea
            id="content"
            name="content"
            rows="8"
            required
        >{{ old('content') }}</textarea>
    </div>

    <button type="submit">
        Opslaan
    </button>
</form>
