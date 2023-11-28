<x-form.field>
    <button
        type="submit"
        {{ $attributes->merge(['class' => "bg-blue-500 text-white uppercase font-semibold text-xs py-3 px-8 rounded-lg hover:bg-blue-600"]) }}
    >
        {{ $slot }}
    </button>
</x-form.field>
