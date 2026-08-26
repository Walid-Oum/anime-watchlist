<h1>FAQ</h1>

@forelse($categories as $category)
    <section>
        <h2>{{ $category->name }}</h2>

        @forelse($category->faqs as $faq)
            <div>
                <h3>{{ $faq->question }}</h3>
                <p>{{ $faq->answer }}</p>
            </div>
        @empty
            <p>Geen vragen in deze categorie.</p>
        @endforelse
    </section>

    <hr>
@empty
    <p>Er zijn nog geen FAQ-categorieën.</p>
@endforelse
