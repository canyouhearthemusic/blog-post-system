@props(['comment', 'is_yours' => false])

<article {{ $attributes->merge(['class' => 'mb-4 flex gap-4']) }}>
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{ $comment->user_id }}" class="border-2 {{ $is_yours ? "border-green-400" : "border-blue-400"}} rounded-2xl" width="60" height="60" alt="avatar">
    </div>

    <div>
        <header>
            <h3 class="font-bold"> {{ $comment->author->name }}</h3>
            <p class="text-xs">Posted <time> {{ $comment->created_at->diffForHumans() }} </time></p>
        </header>

        <p class="mt-2"> {{ $comment->body }} </p>
    </div>
</article>
