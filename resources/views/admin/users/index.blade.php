<x-layouts.admin>
    <x-slot name="title">
        Gebruikersbeheer
    </x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-gray-900">
                Gebruikersbeheer
            </h1>

            <p class="mt-2 text-sm text-gray-600">
                Beheer gebruikers en adminrechten.
            </p>
        </div>

        <a
            href="{{ route('admin.users.create') }}"
            class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 font-medium"
        >
            Nieuwe gebruiker
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-gray-200">
        @foreach($users as $user)
            <div class="flex items-center justify-between p-4 border-b border-gray-200 last:border-b-0">
                <div>
                    <p class="font-medium text-gray-900">
                        {{ $user->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $user->email }}
                    </p>

                    <p class="text-sm mt-1">
                        @if($user->is_admin)
                            <span class="text-teal-700 font-medium">Admin</span>
                        @else
                            <span class="text-gray-500">Gebruiker</span>
                        @endif
                    </p>
                </div>

                <a
                    href="{{ route('admin.users.edit', $user) }}"
                    class="text-teal-700 hover:underline"
                >
                    Bewerken
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.admin>
