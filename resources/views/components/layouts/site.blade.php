<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'AniWatchlist' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<nav class="bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between">
        <a href="{{ route('animes.index') }}" class="font-bold">
            AniWatchlist
        </a>

        <div class="flex gap-4">
            <a href="{{ route('animes.index') }}">Anime</a>
            <a href="{{ route('news.index') }}">Nieuws</a>
            <a href="{{ route('faq.index') }}">FAQ</a>
            <a href="{{ route('contact.create') }}">Contact</a>

            @auth
                <a href="{{ route('watchlist.index') }}">Watchlist</a>
                <a href="{{ route('profile.edit') }}">Profiel</a>
            @endauth
        </div>
    </div>
</nav>

<main class="max-w-6xl mx-auto px-6 py-8">
    {{ $slot }}
</main>

</body>
</html>
