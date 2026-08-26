<x-layouts.site>
    <x-slot name="title">
        {{ $user->username ?? $user->name }}
    </x-slot>

    <div class="max-w-3xl">
        <div class="bg-white border border-gray-200 p-6">
            <div class="flex flex-col sm:flex-row gap-6">

                <div class="flex-shrink-0">
                    @if($user->profile_photo)
                        <img
                            src="{{ asset('storage/' . $user->profile_photo) }}"
                            alt="Profielfoto van {{ $user->username ?? $user->name }}"
                            class="w-32 h-32 rounded-full object-cover"
                        >
                    @else
                        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                            Geen foto
                        </div>
                    @endif
                </div>

                <div>
                    <h1 class="text-3xl font-semibold text-gray-900">
                        {{ $user->username ?? $user->name }}
                    </h1>

                    @if($user->birthday)
                        <p class="mt-2 text-sm text-gray-500">
                            Verjaardag: {{ $user->birthday->format('d/m/Y') }}
                        </p>
                    @endif

                    @if($user->about)
                        <p class="mt-5 text-gray-700 leading-7">
                            {{ $user->about }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.site>
