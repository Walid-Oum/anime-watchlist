<x-layouts.admin>
    <x-slot name="title">
        FAQ-categorie toevoegen
    </x-slot>

    <div class="max-w-xl">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">
            FAQ-categorie toevoegen
        </h1>

        <form
            method="POST"
            action="{{ route('admin.faq-categories.store') }}"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf

            <x-form-input
                name="name"
                label="Naam"
                required
            />

            <button
                type="submit"
                class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
            >
                Opslaan
            </button>
        </form>
    </div>
</x-layouts.admin>
