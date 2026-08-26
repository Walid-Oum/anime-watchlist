<x-layouts.site>
    <x-slot name="title">
        Mijn watchlist
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            Mijn watchlist
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Beheer je voortgang, status en scores.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($animes as $anime)
            <div class="bg-white border border-gray-200 p-5">
                <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">
                            <a
                                href="{{ route('animes.show', $anime) }}"
                                class="text-gray-900 hover:text-teal-700"
                            >
                                {{ $anime->title }}
                            </a>
                        </h2>

                        @if($anime->episodes)
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $anime->episodes }} afleveringen
                            </p>
                        @endif
                    </div>

                    <form
                        method="POST"
                        action="{{ route('watchlist.update', $anime) }}"
                        class="flex flex-col md:flex-row md:items-end gap-4"
                    >
                        @csrf
                        @method('PATCH')

                        <div>
                            <label
                                for="status-{{ $anime->id }}"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Status
                            </label>

                            <select
                                id="status-{{ $anime->id }}"
                                name="status"
                                required
                                class="border border-gray-300 px-3 py-2 bg-white"
                            >
                                <option value="plan_to_watch"
                                    {{ $anime->pivot->status === 'plan_to_watch' ? 'selected' : '' }}>
                                    Plan to watch
                                </option>

                                <option value="watching"
                                    {{ $anime->pivot->status === 'watching' ? 'selected' : '' }}>
                                    Watching
                                </option>

                                <option value="completed"
                                    {{ $anime->pivot->status === 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>

                                <option value="dropped"
                                    {{ $anime->pivot->status === 'dropped' ? 'selected' : '' }}>
                                    Dropped
                                </option>
                            </select>
                        </div>

                        <div>
                            <label
                                for="episodes-{{ $anime->id }}"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Afleveringen
                            </label>

                            <input
                                id="episodes-{{ $anime->id }}"
                                type="number"
                                name="episodes_watched"
                                min="0"
                                @if($anime->episodes)
                                    max="{{ $anime->episodes }}"
                                @endif
                                value="{{ old('episodes_watched', $anime->pivot->episodes_watched) }}"
                                required
                                class="w-24 border border-gray-300 px-3 py-2"
                            >
                        </div>

                        <div>
                            <label
                                for="rating-{{ $anime->id }}"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Score
                            </label>

                            <input
                                id="rating-{{ $anime->id }}"
                                type="number"
                                name="rating"
                                min="1"
                                max="10"
                                value="{{ old('rating', $anime->pivot->rating) }}"
                                class="w-20 border border-gray-300 px-3 py-2"
                            >
                        </div>

                        <button
                            type="submit"
                            class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 font-medium"
                        >
                            Opslaan
                        </button>
                    </form>

                    <form
                        method="POST"
                        action="{{ route('watchlist.destroy', $anime) }}"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="text-red-700 hover:underline text-sm"
                        >
                            Verwijderen
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white border border-gray-200 p-8 text-center">
                <p class="text-gray-600">
                    Je watchlist is nog leeg.
                </p>

                <a
                    href="{{ route('animes.index') }}"
                    class="inline-block mt-3 text-teal-700 hover:underline"
                >
                    Bekijk anime
                </a>
            </div>
        @endforelse
    </div>
</x-layouts.site>
