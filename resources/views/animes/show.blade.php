<x-layouts.site>
    <x-slot name="title">
        {{ $anime->title }}
    </x-slot>

    <a
        href="{{ route('animes.index') }}"
        class="text-sm text-teal-700 hover:underline"
    >
        ← Terug naar anime
    </a>

    <div class="mt-6 bg-white border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-56 flex-shrink-0">
                @if($anime->cover_image)
                    <img
                        src="{{ asset('storage/' . $anime->cover_image) }}"
                        alt="{{ $anime->title }}"
                        class="w-full object-cover"
                    >
                @else
                    <div class="h-72 bg-gray-200 flex items-center justify-center text-gray-500">
                        Geen afbeelding
                    </div>
                @endif
            </div>

            <div class="flex-1">
                <h1 class="text-3xl font-semibold text-gray-900">
                    {{ $anime->title }}
                </h1>

                <div class="mt-4 flex gap-6 text-sm text-gray-600">
                    @if($anime->release_year)
                        <p>
                            <span class="font-medium text-gray-900">Jaar:</span>
                            {{ $anime->release_year }}
                        </p>
                    @endif

                    @if($anime->episodes)
                        <p>
                            <span class="font-medium text-gray-900">Afleveringen:</span>
                            {{ $anime->episodes }}
                        </p>
                    @endif
                </div>

                @if($anime->description)
                    <p class="mt-6 leading-7 text-gray-700">
                        {{ $anime->description }}
                    </p>
                @endif

                @auth
                    <form
                        method="POST"
                        action="{{ route('watchlist.store', $anime) }}"
                        class="mt-8"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
                        >
                            Voeg toe aan watchlist
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</x-layouts.site>
