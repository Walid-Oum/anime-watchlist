<x-layouts.admin>
    <x-slot name="title">
        Gebruiker bewerken
    </x-slot>

    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">
            Gebruiker bewerken
        </h1>

        <form
            method="POST"
            action="{{ route('admin.users.update', $user) }}"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf
            @method('PUT')

            <x-form-input
                name="name"
                label="Naam"
                :value="$user->name"
                required
            />

            <x-form-input
                name="username"
                label="Username"
                :value="$user->username"
            />

            <x-form-input
                name="email"
                label="E-mail"
                type="email"
                :value="$user->email"
                required
            />

            <div class="mb-6">
                <label class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        name="is_admin"
                        value="1"
                        {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                    >

                    <span>Admin</span>
                </label>
            </div>

            <button
                type="submit"
                class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
            >
                Wijzigingen opslaan
            </button>
        </form>
    </div>
</x-layouts.admin>
