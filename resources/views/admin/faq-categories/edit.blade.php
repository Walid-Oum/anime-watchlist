<h1>FAQ-categorie bewerken</h1>

<form method="POST"
      action="{{ route('admin.faq-categories.update', $faqCategory) }}">
    @csrf
    @method('PUT')

    <label for="name">Naam</label>

    <input
        id="name"
        type="text"
        name="name"
        value="{{ old('name', $faqCategory->name) }}"
        required
    >

    <button type="submit">
        Wijzigingen opslaan
    </button>
</form>
