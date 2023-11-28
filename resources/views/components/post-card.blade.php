@props(['post'])
<article
    {{ $attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}
    x-data="{show: false}"
    x-on:mouseenter="show = true"
    x-on:mouseleave="show = false"
>
    <div class="h-full grid justify-between py-6 px-5">
        <div>
            <img
                src="{{ isset($post->thumbnail) ? asset('storage/' . $post->thumbnail) : "/images/illustration-4.png"}}"
                alt="Blog Post illustration" class="rounded-xl grid-flow-col w-full">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2 flex justify-between">
                    <a href="categories/{{ $post->category->slug }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">
                        {{ $post->category->name }}
                    </a>

                    @can('manage-post', $post)

                        <div class="flex gap-x-4 items-center" x-show="show">
                            <a
                                href="/posts/{{ $post->slug  }}/edit"

                            >
                                <x-edit-icon/>
                            </a>

                            <form action="/posts/{{ $post->slug }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <x-delete-icon/>
                                </button>
                            </form>

                        </div>

                    @endcan



                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">

                <div class="flex items-center text-sm flex-1">
                    <img src="https://i.pravatar.cc/100?u={{ $post->user_id }}" class="border rounded-2xl" width="60"
                         height="60" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <p> {{ $post->author->name }} </p>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full lg:py-2 lg:px-6"
                    >
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
