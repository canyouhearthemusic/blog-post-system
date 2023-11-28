<x-layout>
    @include("posts._header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-14 space-y-6">
        @include('posts._add-post')
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>
            {{ $posts->links() }}
        @else
            <p class="text-lg text-center text-red-700">There's no posts</p>
        @endif
    </main>
</x-layout>
