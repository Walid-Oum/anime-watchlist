<x-layouts.admin>
    <x-slot name="title">
        Nieuwsitem bewerken
    </x-slot>

    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">
            Nieuwsitem bewerken
        </h1>

        <form
            method="POST"
            action="{{ route('admin.news.update', $newsItem) }}"
            enctype="multipart/form-data"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf
            @method('PUT')

            <x-form-input
                name="title"
                label="Titel"
                :value="$newsItem->title"
                required
            />

            <x-form-input
                name="published_at"
                label="Publicatiedatum"
                type="date"
                :value="$newsItem->published_at->format('Y-m-d')"
                required
            />

            <div class="mb-4">
                <label for="image" class="block mb-1 font-medium">
                    Nieuwe afbeelding
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/png,image/jpeg,image/webp"
                    class="w-full border border-gray-300 px-3 py-2"
                >
            </div>

            @if($newsItem->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">
                        Huidige afbeelding
                    </p>

                    <img
                        src="{{ asset('storage/' . $newsItem->image) }}"
                        alt="{{ $newsItem->title }}"
                        class="w-48 object-cover"
                    >
                </div>
            @endif

            <div class="mb-4">
                <label for="content" class="block mb-1 font-medium">
                    Inhoud
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="8"
                    required
                    class="w-full border border-gray-300 px-3 py-2"
                >{{ old('content', $newsItem->content) }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
            >
                Wijzigingen opslaan
            </button>
        </form>
    </div>
</x-layouts.admin>
