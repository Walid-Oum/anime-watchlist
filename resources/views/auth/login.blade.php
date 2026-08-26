<x-layouts.site>
    <x-slot name="title">
        Inloggen
    </x-slot>

    <div class="max-w-md mx-auto">
        <div class="bg-white border border-gray-200 p-6">
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">
                Inloggen
            </h1>

            @if(session('status'))
                <div class="mb-4 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <x-form-input
                    name="email"
                    label="E-mail"
                    type="email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <x-form-input
                    name="password"
                    label="Wachtwoord"
                    type="password"
                    required
                    autocomplete="current-password"
                />

                <div class="mb-5">
                    <label class="flex items-center gap-2 text-sm text-gray-700">
                        <input
                            type="checkbox"
                            name="remember"
                            class="border-gray-300"
                        >

                        Onthoud mij
                    </label>
                </div>

                <div class="flex items-center justify-between gap-4">
                    @if(Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-teal-700 hover:underline"
                        >
                            Wachtwoord vergeten?
                        </a>
                    @endif

                    <button
                        type="submit"
                        class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
                    >
                        Inloggen
                    </button>
                </div>
            </form>

            <p class="mt-6 text-sm text-gray-600">
                Nog geen account?

                <a
                    href="{{ route('register') }}"
                    class="text-teal-700 hover:underline"
                >
                    Registreren
                </a>
            </p>
        </div>
    </div>
</x-layouts.site>
