@php
    $styles = "bg-gray-100 hover:bg-gray-200 duration-200 border border-gray-200 hover:border-gray-300 p-6 rounded-xl mb-4"
@endphp

<section class="mt-10">
    @include('posts._add-comment-form')

    @if($post->has('comments'))
        @foreach($post->comments->sortByDesc('created_at') as $comment)
            <x-post-comment
                class="{{ $styles }}"
                :comment="$comment"
                :is_yours="auth()->user()?->id === $comment->user_id"/>
        @endforeach
    @endif
</section>
