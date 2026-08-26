<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                @if($user->profile_photo)
                    <img
                        src="{{ asset('storage/' . $user->profile_photo) }}"
                        alt="Profielfoto van {{ $user->username ?? $user->name }}"
                        class="w-32 h-32 rounded-full object-cover"
                    >
                @endif

                <h1 class="text-2xl font-bold mt-4">
                    {{ $user->username ?? $user->name }}
                </h1>

                @if($user->birthday)
                    <p>
                        Verjaardag: {{ $user->birthday->format('d/m/Y') }}
                    </p>
                @endif

                @if($user->about)
                    <p class="mt-4">
                        {{ $user->about }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
