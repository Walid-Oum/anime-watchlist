<x-layouts.site>
    <x-slot name="title">
        Anime
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">Anime</h1>
        <p class="mt-2 text-sm text-gray-600">
            Ontdek anime en voeg ze toe aan je persoonlijke watchlist.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($animes as $anime)
            <a
                href="{{ route('animes.show', $anime) }}"
                class="block bg-white border border-gray-200 hover:border-teal-600 transition"
            >
                @if($anime->cover_image)
                    <img
                        src="{{ asset('storage/' . $anime->cover_image) }}"
                        alt="{{ $anime->title }}"
                        class="w-full h-72 object-cover"
                    >
                @else
                    <div class="w-full h-72 bg-gray-200 flex items-center justify-center text-gray-500">
                        Geen afbeelding
                    </div>
                @endif

                <div class="p-4">
                    <h2 class="font-semibold text-gray-900">
                        {{ $anime->title }}
                    </h2>

                    @if($anime->release_year)
                        <p class="mt-1 text-sm text-gray-500">
                            {{ $anime->release_year }}
                        </p>
                    @endif
                </div>
            </a>
        @empty
            <p class="text-gray-600">
                Er zijn nog geen anime toegevoegd.
            </p>
        @endforelse
    </div>
</x-layouts.site>
