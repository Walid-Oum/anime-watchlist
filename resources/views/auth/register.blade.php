<x-layouts.site>
    <x-slot name="title">
        Registreren
    </x-slot>

    <div class="max-w-md mx-auto">
        <div class="bg-white border border-gray-200 p-6">
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">
                Account aanmaken
            </h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-form-input
                    name="name"
                    label="Naam"
                    required
                    autofocus
                    autocomplete="name"
                />

                <x-form-input
                    name="email"
                    label="E-mail"
                    type="email"
                    required
                    autocomplete="username"
                />

                <x-form-input
                    name="password"
                    label="Wachtwoord"
                    type="password"
                    required
                    minlength="8"
                    autocomplete="new-password"
                />

                <x-form-input
                    name="password_confirmation"
                    label="Bevestig wachtwoord"
                    type="password"
                    required
                    minlength="8"
                    autocomplete="new-password"
                />

                <div class="flex items-center justify-between gap-4 mt-6">
                    <a
                        href="{{ route('login') }}"
                        class="text-sm text-teal-700 hover:underline"
                    >
                        Al een account?
                    </a>

                    <button
                        type="submit"
                        class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
                    >
                        Registreren
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.site>
