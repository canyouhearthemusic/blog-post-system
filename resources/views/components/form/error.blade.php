@props(['name'])

@error($name)
    <p class="mt-3 text-xs text-red-500"> {{ $message }}</p>
@enderror
