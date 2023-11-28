@props(['heading'])

<section class="py-8 max-w-4xl mx-auto mt-4">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="grid grid-cols-12 gap-x-4">
        <aside class="col-span-4">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul class="leading-8">
                <li>
                    <a
                        href="/posts/create"
                        class="{{ request()->routeIs('posts.create') ? 'text-blue-500' : '' }}"
                    >
                        New Post
                    </a>
                </li>

                <li>
                    <a
                        href="/categories/create"
                        class="{{ request()->routeIs('categories.create') ? 'text-blue-500' : '' }}"
                    >
                        New Category
                    </a>
                </li>

            </ul>
        </aside>

        <main class="col-span-8">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>

</section>
