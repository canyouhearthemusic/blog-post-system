@if(session()->has('success'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="fixed bottom-4 right-4 border rounded-2xl py-3 px-6 bg-green-500"
    >
        <p class="text-white text-md"> {{ session()->get('success') }} </p>
    </div>
@elseif(session()->has('error'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="fixed bottom-4 right-4 border rounded-2xl py-3 px-6 bg-red-500"
    >
        <p class="text-white text-md"> {{ session()->get('error') }} </p>
    </div>
@endif
