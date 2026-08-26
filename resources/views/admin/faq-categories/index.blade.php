<x-layouts.admin>
    <x-slot name="title">
        FAQ-categorieën
    </x-slot>

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            FAQ-categorieën
        </h1>

        <a
            href="{{ route('admin.faq-categories.create') }}"
            class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 font-medium"
        >
            Nieuwe categorie
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-gray-200">
        @forelse($categories as $category)
            <div class="flex items-center justify-between p-4 border-b border-gray-200 last:border-b-0">
                <strong>{{ $category->name }}</strong>

                <div class="flex gap-4">
                    <a
                        href="{{ route('admin.faq-categories.edit', $category) }}"
                        class="text-teal-700 hover:underline"
                    >
                        Bewerken
                    </a>

                    <form
                        method="POST"
                        action="{{ route('admin.faq-categories.destroy', $category) }}"
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
        @empty
            <p class="p-4 text-gray-600">
                Geen categorieën gevonden.
            </p>
        @endforelse
    </div>
</x-layouts.admin>
