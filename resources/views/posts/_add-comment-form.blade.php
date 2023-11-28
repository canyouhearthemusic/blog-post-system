@auth
    <form action="/posts/{{ $post->slug }}/comments" method="post" class="{{ $styles }} flex gap-4">
        @csrf

        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" class="border-2 border-green-300 rounded-2xl"
                 width="75" height="75" alt="avatar">
        </div>

        <div class="w-full" x-data="{show: false}">
            <textarea
                name="body"
                id="body"
                class="border border-gray-400 p-2 w-full rounded-md mt-2 text-sm font-mono"
                placeholder="Leave your comment here."
                @click.away="show = false"
                @click="show = true"
            >{{ old('body') }}</textarea>

            @error('body')
            <p class="text-xs text-red-500"> {{ $message }} </p>
            @enderror

            <div class="flex justify-end mt-2 gap-1" x-show="show">
                <x-form.button>Post</x-form.button>
            </div>
        </div>
    </form>
@else
    <div class="{{ $styles }}">
        <p class="text-lg font-semibold text-center text-gray-500">
            You must be logged in to comment posts.
        </p>
    </div>
@endauth
