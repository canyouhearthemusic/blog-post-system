<div>
    <x-dropdown class="max-h-52 max-w-sm w-full">

        <x-slot name="trigger">
            <button class="py-2 px-7 text-sm font-semibold w-full lg:w-42 md:w-full sm:w-full">
                <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 8px;"/>

                {{ isset($currentCategory->name) ? ucwords($currentCategory->name) : "Category" }}

            </button>
        </x-slot>

        <x-dropdown-item
            href="/?{{ http_build_query(request()->except('category', 'page')) }}"
            :active="!request()->has('category')"
        >
            All
        </x-dropdown-item>

        @foreach($categories as $category)
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                :active='request("category") === $category->slug'
            >
                {{ ucwords($category->name) }}

            </x-dropdown-item>
        @endforeach

    </x-dropdown>
</div>
