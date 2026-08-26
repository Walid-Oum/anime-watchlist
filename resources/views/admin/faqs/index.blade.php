<x-layouts.admin>
    <x-slot name="title">
        FAQ-vragen
    </x-slot>

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            FAQ-vragen
        </h1>

        <a
            href="{{ route('admin.faqs.create') }}"
            class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 font-medium"
        >
            Nieuwe FAQ-vraag
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($faqs as $faq)
            <div class="bg-white border border-gray-200 p-5">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="font-semibold text-gray-900">
                            {{ $faq->question }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Categorie: {{ $faq->category->name }}
                        </p>
                    </div>

                    <div class="flex gap-4">
                        <a
                            href="{{ route('admin.faqs.edit', $faq) }}"
                            class="text-teal-700 hover:underline"
                        >
                            Bewerken
                        </a>

                        <form
                            method="POST"
                            action="{{ route('admin.faqs.destroy', $faq) }}"
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
            </div>
        @empty
            <p class="text-gray-600">
                Geen FAQ-vragen gevonden.
            </p>
        @endforelse
    </div>
</x-layouts.admin>
