<h1>FAQ-vraag toevoegen</h1>

<form method="POST" action="{{ route('admin.faqs.store') }}">
    @csrf

    <div>
        <label for="faq_category_id">Categorie</label>

        <select id="faq_category_id" name="faq_category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="question">Vraag</label>
        <input
            id="question"
            type="text"
            name="question"
            value="{{ old('question') }}"
            required
        >
    </div>

    <div>
        <label for="answer">Antwoord</label>
        <textarea id="answer" name="answer" required>{{ old('answer') }}</textarea>
    </div>

    <button type="submit">Opslaan</button>
</form>
