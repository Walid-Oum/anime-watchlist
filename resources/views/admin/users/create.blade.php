<x-layouts.admin>
    <x-slot name="title">
        Nieuwe gebruiker
    </x-slot>

    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">
            Nieuwe gebruiker
        </h1>

        <form
            method="POST"
            action="{{ route('admin.users.store') }}"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf

            <x-form-input
                name="name"
                label="Naam"
                required
            />

            <x-form-input
                name="username"
                label="Username"
            />

            <x-form-input
                name="email"
                label="E-mail"
                type="email"
                required
            />

            <x-form-input
                name="password"
                label="Wachtwoord"
                type="password"
                required
                minlength="8"
            />

            <div class="mb-6">
                <label class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        name="is_admin"
                        value="1"
                    >

                    <span>Admin</span>
                </label>
            </div>

            <button
                type="submit"
                class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
            >
                Gebruiker aanmaken
            </button>
        </form>
    </div>
</x-layouts.admin>
