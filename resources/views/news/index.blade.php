<x-layouts.site>
    <x-slot name="title">
        Nieuws
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            Laatste nieuwtjes
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Updates en nieuws over AniWatchlist.
        </p>
    </div>

    <div class="space-y-4">
        @forelse($newsItems as $newsItem)
            <article class="bg-white border border-gray-200 p-5">
                <h2 class="text-xl font-semibold">
                    <a
                        href="{{ route('news.show', $newsItem) }}"
                        class="text-gray-900 hover:text-teal-700"
                    >
                        {{ $newsItem->title }}
                    </a>
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    {{ $newsItem->published_at->format('d/m/Y') }}
                </p>
            </article>
        @empty
            <p class="text-gray-600">
                Er zijn nog geen nieuwsitems.
            </p>
        @endforelse
    </div>
</x-layouts.site>
