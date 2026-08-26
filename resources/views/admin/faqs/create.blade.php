<x-layouts.admin>
    <x-slot name="title">
        FAQ-vraag toevoegen
    </x-slot>

    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">
            FAQ-vraag toevoegen
        </h1>

        <form
            method="POST"
            action="{{ route('admin.faqs.store') }}"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf

            <div class="mb-4">
                <label for="faq_category_id" class="block mb-1 font-medium">
                    Categorie
                </label>

                <select
                    id="faq_category_id"
                    name="faq_category_id"
                    required
                    class="w-full border border-gray-300 px-3 py-2 bg-white"
                >
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <x-form-input
                name="question"
                label="Vraag"
                required
            />

            <div class="mb-4">
                <label for="answer" class="block mb-1 font-medium">
                    Antwoord
                </label>

                <textarea
                    id="answer"
                    name="answer"
                    rows="6"
                    required
                    class="w-full border border-gray-300 px-3 py-2"
                >{{ old('answer') }}</textarea>
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
