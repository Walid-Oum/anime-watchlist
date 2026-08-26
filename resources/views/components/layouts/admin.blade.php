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
    <aside class="w-64 bg-gray-900 text-white p-6">
        <h2 class="text-xl font-bold mb-6">
            AniWatchlist Admin
        </h2>

        <nav class="space-y-3">
            <a class="block hover:text-teal-300" href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a class="block hover:text-teal-300" href="{{ route('admin.users.index') }}">
                Gebruikers
            </a>

            <a class="block hover:text-teal-300" href="{{ route('admin.news.index') }}">
                Nieuws
            </a>

            <a class="block hover:text-teal-300" href="{{ route('admin.faq-categories.index') }}">
                FAQ-categorieën
            </a>

            <a class="block hover:text-teal-300" href="{{ route('admin.faqs.index') }}">
                FAQ-vragen
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        {{ $slot }}
    </main>
</div>

</body>
</html>
