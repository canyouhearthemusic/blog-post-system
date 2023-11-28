@props(['trigger'])

<div x-data="{show: false}" @click.away = "show = false">
    {{--    Trigger    --}}
    <div @click = "show = !show">
        {{ $trigger }}
    </div>

    {{--  Elements  --}}
    <div x-show="show"
         {{ $attributes->merge(['class' => "absolute z-50 bg-gray-100 rounded-xl mt-2 py-2 px-1 overflow-auto"]) }}
         style="display:none;"
    >
        {{ $slot }}
    </div>

</div>
