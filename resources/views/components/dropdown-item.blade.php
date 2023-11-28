@props(['active' => false])

@php
$classes = "block text-left rounded-md text-sm px-3 leading-8 hover:bg-gray-300 focus:bg-gray-300";
if($active) $classes .= " bg-blue-500 text-white";
@endphp

<a {{ $attributes->merge(["class" => $classes])}}> {{ $slot }} </a>
