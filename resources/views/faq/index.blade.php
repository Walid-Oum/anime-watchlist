<x-layouts.site>
    <x-slot name="title">
        FAQ
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            FAQ
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Veelgestelde vragen over AniWatchlist en je watchlist.
        </p>
    </div>

    <div class="space-y-8">
        @forelse($categories as $category)
            <section>
                <h2 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ $category->name }}
                </h2>

                <div class="space-y-3">
                    @forelse($category->faqs as $faq)
                        <div class="bg-white border border-gray-200 p-5">
                            <h3 class="font-semibold text-gray-900">
                                {{ $faq->question }}
                            </h3>

                            <p class="mt-2 text-gray-700 leading-6">
                                {{ $faq->answer }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500">
                            Geen vragen in deze categorie.
                        </p>
                    @endforelse
                </div>
            </section>
        @empty
            <p class="text-gray-600">
                Er zijn nog geen FAQ-categorieën.
            </p>
        @endforelse
    </div>
</x-layouts.site>
