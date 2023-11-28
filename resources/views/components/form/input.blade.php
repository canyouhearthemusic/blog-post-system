@props(['name', 'type' => 'text', 'value'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input
        class="border rounded-md border-gray-400 p-2 w-full"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value ?? old($name) }}"
    >

    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.field>
