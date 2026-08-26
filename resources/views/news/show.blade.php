<x-layouts.site>
    <x-slot name="title">
        {{ $newsItem->title }}
    </x-slot>

    <a
        href="{{ route('news.index') }}"
        class="text-sm text-teal-700 hover:underline"
    >
        ← Terug naar nieuws
    </a>

    <article class="mt-6 bg-white border border-gray-200 p-6">
        <h1 class="text-3xl font-semibold text-gray-900">
            {{ $newsItem->title }}
        </h1>

        <p class="mt-2 text-sm text-gray-500">
            {{ $newsItem->published_at->format('d/m/Y') }}
        </p>

        @if($newsItem->image)
            <img
                src="{{ asset('storage/' . $newsItem->image) }}"
                alt="{{ $newsItem->title }}"
                class="mt-6 max-w-lg w-full object-cover"
            >
        @endif

        <p class="mt-6 leading-7 text-gray-700 whitespace-pre-line">
            {{ $newsItem->content }}
        </p>
    </article>
</x-layouts.site>
