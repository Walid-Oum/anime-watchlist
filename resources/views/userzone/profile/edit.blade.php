<x-layouts.site>
    <x-slot name="title">
        Profiel
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">
            Profiel
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Beheer je profielgegevens en accountinstellingen.
        </p>
    </div>

    <div class="space-y-6">
        <div class="bg-white border border-gray-200 p-6">
            <div class="max-w-xl">
                @include('userzone.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-white border border-gray-200 p-6">
            <div class="max-w-xl">
                @include('userzone.profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-white border border-gray-200 p-6">
            <div class="max-w-xl">
                @include('userzone.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-layouts.site>
