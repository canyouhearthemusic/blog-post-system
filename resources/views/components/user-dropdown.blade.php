<x-dropdown class="right-36 max-w- max-h-48">
    <x-slot name="trigger">
        <p class="mr-5 font-bold text-xs uppercase cursor-pointer">
            {{ auth()->user()->name }}
            <x-icon name="down-arrow" class="absolute" style="right: 127px; top: 24px"/>
        </p>
    </x-slot>

    <x-dropdown-item href="/admin/dashboard">Dashboard</x-dropdown-item>
    <x-dropdown-item href="/admin/settings">Settings</x-dropdown-item>

</x-dropdown>
