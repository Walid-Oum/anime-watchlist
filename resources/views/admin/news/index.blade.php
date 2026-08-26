<x-layouts.admin>
    <x-slot name="title">
        Nieuwsbeheer
    </x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-gray-900">
                Nieuwsbeheer
            </h1>

            <p class="mt-2 text-sm text-gray-600">
                Beheer de nieuwsitems van AniWatchlist.
            </p>
        </div>

        <a
            href="{{ route('admin.news.create') }}"
            class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 font-medium"
        >
            Nieuw nieuwsitem
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($newsItems as $newsItem)
            <article class="bg-white border border-gray-200 p-5">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="font-semibold text-gray-900">
                            {{ $newsItem->title }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            {{ $newsItem->published_at->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <a
                            href="{{ route('admin.news.edit', $newsItem) }}"
                            class="text-teal-700 hover:underline"
                        >
                            Bewerken
                        </a>

                        <form
                            method="POST"
                            action="{{ route('admin.news.destroy', $newsItem) }}"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="text-red-700 hover:underline"
                            >
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-gray-600">
                Er zijn nog geen nieuwsitems.
            </p>
        @endforelse
    </div>
</x-layouts.admin>
