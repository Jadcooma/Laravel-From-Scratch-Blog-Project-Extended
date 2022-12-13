@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <trix-editor
        input="{{ $name }}"
        class="trix border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</trix-editor>

    <x-form.error name="{{ $name }}" />
</x-form.field>
