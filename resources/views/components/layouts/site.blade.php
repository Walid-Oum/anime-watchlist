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
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold">
            AniWatchlist
        </a>

        <div class="flex items-center gap-6">
            <a href="{{ route('animes.index') }}">Anime</a>
            <a href="{{ route('news.index') }}">Nieuws</a>
            <a href="{{ route('faq.index') }}">FAQ</a>
            <a href="{{ route('contact.create') }}">Contact</a>

            @auth
                <span class="h-5 border-l border-gray-600"></span>

                <a href="{{ route('watchlist.index') }}">
                    Watchlist
                </a>

                <a href="{{ route('profile.edit') }}">
                    Profiel
                </a>

                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}">
                        Admin
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="text-gray-300 hover:text-white"
                    >
                        Uitloggen
                    </button>
                </form>
            @else
                <span class="h-5 border-l border-gray-600"></span>

                <a href="{{ route('login') }}">
                    Inloggen
                </a>

                <a href="{{ route('register') }}">
                    Registreren
                </a>
            @endauth
        </div>
    </div>
</nav>

<main class="max-w-6xl mx-auto px-6 py-8">
    {{ $slot }}
</main>

</body>
</html>
