@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
])

<div class="mb-4">
    <label for="{{ $name }}" class="block mb-1 font-medium">
        {{ $label }}
    </label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        @if($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full border border-gray-300 rounded px-3 py-2'
        ]) }}
    >

    @error($name)
    <p class="text-red-600 text-sm mt-1">
        {{ $message }}
    </p>
    @enderror
</div>
