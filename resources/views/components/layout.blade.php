@php use Illuminate\Support\Facades\Auth; @endphp
<!doctype html>
<head>
    <title>Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>


<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-4">
    <nav class="md:flex md:justify-between md:items-center">
        <a href="/" class="font-semibold text-lg">Home</a>
        <div class="flex items-center mt-8 md:mt-0 ">
            @auth
                <x-user-dropdown/>
                <form action="/logout" method="post">
                    @csrf
                    <button
                        type="submit"
                        class="bg-blue-500 transition-colors hover:bg-red-600 duration-200 ml-3 rounded-md text-xs font-semibold text-white uppercase py-3 px-5"
                    >
                        Log Out
                    </button>
                </form>
            @else
                <a href="/register" class="text-xs font-bold uppercase"> Sign up </a>
                <a
                    href="/login"
                    class="bg-blue-500 ml-3 rounded-lg text-xs font-semibold text-white uppercase py-3 px-5"
                >
                    Log In
                </a>
            @endauth


        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Your email address"
                            class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none"
                        >
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
            @error('email')
                <p class="mt-3 text-xs text-red-500"> {{ $message }}</p>
            @enderror
        </div>
    </footer>
</section>
<x-flash/>
</body>
