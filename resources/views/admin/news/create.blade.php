<x-layouts.admin>
    <x-slot name="title">
        Nieuwsitem toevoegen
    </x-slot>

    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">
            Nieuwsitem toevoegen
        </h1>

        <form
            method="POST"
            action="{{ route('admin.news.store') }}"
            enctype="multipart/form-data"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf

            <x-form-input
                name="title"
                label="Titel"
                required
            />

            <x-form-input
                name="published_at"
                label="Publicatiedatum"
                type="date"
                required
            />

            <div class="mb-4">
                <label for="image" class="block mb-1 font-medium">
                    Afbeelding
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/png,image/jpeg,image/webp"
                    class="w-full border border-gray-300 px-3 py-2"
                >

                @error('image')
                <p class="text-red-600 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

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
                >{{ old('content') }}</textarea>

                @error('content')
                <p class="text-red-600 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button
                type="submit"
                class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
            >
                Opslaan
            </button>
        </form>
    </div>
</x-layouts.admin>
