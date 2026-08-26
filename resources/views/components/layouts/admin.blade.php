<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Admin - AniWatchlist' }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 text-gray-900">

<div class="min-h-screen flex">
    <aside class="w-64 bg-gray-900 text-white p-6 flex flex-col">
        <div>
            <a
                href="{{ route('admin.dashboard') }}"
                class="block text-xl font-bold mb-8"
            >
                AniWatchlist Admin
            </a>

            <nav class="space-y-4">
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="block text-gray-200 hover:text-teal-300"
                >
                    Dashboard
                </a>

                <a
                    href="{{ route('admin.users.index') }}"
                    class="block text-gray-200 hover:text-teal-300"
                >
                    Gebruikers
                </a>

                <a
                    href="{{ route('admin.news.index') }}"
                    class="block text-gray-200 hover:text-teal-300"
                >
                    Nieuws
                </a>

                <a
                    href="{{ route('admin.faq-categories.index') }}"
                    class="block text-gray-200 hover:text-teal-300"
                >
                    FAQ-categorieën
                </a>

                <a
                    href="{{ route('admin.faqs.index') }}"
                    class="block text-gray-200 hover:text-teal-300"
                >
                    FAQ-vragen
                </a>
            </nav>
        </div>

        <div class="mt-auto pt-6 border-t border-gray-700 space-y-4">
            <div class="text-sm text-gray-400">
                Ingelogd als
                <span class="block text-gray-200">
                    {{ auth()->user()->name }}
                </span>
            </div>

            <a
                href="{{ route('home') }}"
                class="block text-gray-300 hover:text-white"
            >
                Terug naar website
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="text-gray-300 hover:text-white"
                >
                    Uitloggen
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-8">
        {{ $slot }}
    </main>
</div>

</body>
</html>
