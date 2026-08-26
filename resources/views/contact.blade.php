<x-layouts.site>
    <x-slot name="title">
        Contact
    </x-slot>

    <div class="max-w-2xl">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-gray-900">
                Contact
            </h1>

            <p class="mt-2 text-sm text-gray-600">
                Heb je een vraag of probleem? Stuur ons een bericht.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('contact.store') }}"
            class="bg-white border border-gray-200 p-6"
        >
            @csrf

            <x-form-input
                name="name"
                label="Naam"
                required
            />

            <x-form-input
                name="email"
                label="E-mail"
                type="email"
                required
            />

            <x-form-input
                name="subject"
                label="Onderwerp"
                required
            />

            <div class="mb-4">
                <label
                    for="message"
                    class="block mb-1 font-medium"
                >
                    Bericht
                </label>

                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    required
                    class="w-full border border-gray-300 px-3 py-2"
                >{{ old('message') }}</textarea>

                @error('message')
                <p class="text-red-600 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button
                type="submit"
                class="bg-teal-700 hover:bg-teal-800 text-white px-5 py-2 font-medium"
            >
                Versturen
            </button>
        </form>
    </div>
</x-layouts.site>
