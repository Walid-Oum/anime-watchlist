<x-layouts.admin>
    <x-slot name="title">
        Admin dashboard
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            Admin dashboard
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Welkom, {{ auth()->user()->name }}.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a
            href="{{ route('admin.users.index') }}"
            class="bg-white border border-gray-200 p-5 hover:border-teal-600"
        >
            <h2 class="font-semibold">Gebruikers</h2>
            <p class="mt-1 text-sm text-gray-500">
                Beheer gebruikers en adminrechten.
            </p>
        </a>

        <a
            href="{{ route('admin.news.index') }}"
            class="bg-white border border-gray-200 p-5 hover:border-teal-600"
        >
            <h2 class="font-semibold">Nieuws</h2>
            <p class="mt-1 text-sm text-gray-500">
                Beheer nieuwsitems.
            </p>
        </a>

        <a
            href="{{ route('admin.faqs.index') }}"
            class="bg-white border border-gray-200 p-5 hover:border-teal-600"
        >
            <h2 class="font-semibold">FAQ</h2>
            <p class="mt-1 text-sm text-gray-500">
                Beheer categorieën en vragen.
            </p>
        </a>
    </div>
</x-layouts.admin>
