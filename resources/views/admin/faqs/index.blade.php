<h1>FAQ-vragen</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('admin.faqs.create') }}">
    Nieuwe FAQ-vraag
</a>

@forelse($faqs as $faq)
    <div>
        <strong>{{ $faq->question }}</strong>

        <p>Categorie: {{ $faq->category->name }}</p>

        <a href="{{ route('admin.faqs.edit', $faq) }}">
            Bewerken
        </a>

        <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}">
            @csrf
            @method('DELETE')

            <button type="submit">Verwijderen</button>
        </form>
    </div>

    <hr>
@empty
    <p>Geen FAQ-vragen gevonden.</p>
@endforelse
