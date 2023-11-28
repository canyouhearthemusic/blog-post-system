<x-layout>
    <x-settings heading="Create a New Category">
        <form action="/categories" method="post">
            @csrf

            <x-form.input name="name"/>

            <x-form.input name="slug"/>

            <div class="flex justify-end">
                <x-form.button type="submit" class="mt-5">
                    Publish
                </x-form.button>
            </div>
        </form>
    </x-settings>

</x-layout>
