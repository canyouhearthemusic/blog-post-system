<x-layout>
    <x-settings heading="Publish New Post">
        <form action="store" method="post" enctype="multipart/form-data">
            @csrf
            <select
                name="category_id" id="category_id"
                class="w-full mx-auto border bg-gray-100 rounded-md px-2 py-2 mb-4"
            >
                <option selected disabled>
                    Select Category
                </option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">
                        {{ ucwords($category->name) }}
                    </option>
                @endforeach

                <x-form.error name="category_id"/>
            </select>

            <x-form.input name="title"/>

            <x-form.textarea name="excerpt"/>

            <x-form.textarea name="body"/>

            <div class="flex justify-between items-center">
                <x-form.input name="thumbnail" type="file"/>

                <x-form.button type="submit" class="mt-5">
                    Publish
                </x-form.button>
            </div>
        </form>
    </x-settings>

</x-layout>
