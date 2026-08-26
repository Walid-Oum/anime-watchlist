<h1>FAQ-categorie toevoegen</h1>

<form method="POST" action="{{ route('admin.faq-categories.store') }}">
    @csrf

    <label for="name">Naam</label>

    <input
        id="name"
        type="text"
        name="name"
        value="{{ old('name') }}"
        required
    >

    <button type="submit">
        Opslaan
    </button>
</form>
