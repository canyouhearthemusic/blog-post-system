<x-layout>
    <div class="mt-10 max-w-md mx-auto">
        <form action="/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <select
                name="category_id" id="category_id"
                class="w-full mx-auto border bg-gray-100 rounded-md px-2 py-2 mb-4"
            >
                <option selected disabled>
                    Select Category
                </option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}"
                        {{ ($post->category->id === $category->id) ? 'selected' : '' }}
                    >
                        {{ ucwords($category->name) }}
                    </option>
                @endforeach

                <x-form.error name="category_id"/>
            </select>

            <x-form.input name="title" :value="$post->title"/>

            <x-form.textarea name="excerpt" :value="$post->excerpt"/>

            <x-form.textarea name="body" :value="$post->body"/>

            <div class="flex justify-between items-center gap-x-4">
                <x-form.input name="thumbnail" type="file"></x-form.input>

                <x-form.button type="submit" class="mt-5">
                    Publish
                </x-form.button>
            </div>
        </form>
    </div>
</x-layout>
