<h1>FAQ-categorieën</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('admin.faq-categories.create') }}">
    Nieuwe categorie
</a>

@forelse($categories as $category)
    <div>
        <strong>{{ $category->name }}</strong>

        <a href="{{ route('admin.faq-categories.edit', $category) }}">
            Bewerken
        </a>

        <form method="POST"
              action="{{ route('admin.faq-categories.destroy', $category) }}">
            @csrf
            @method('DELETE')

            <button type="submit">
                Verwijderen
            </button>
        </form>
    </div>
@empty
    <p>Geen categorieën gevonden.</p>
@endforelse
