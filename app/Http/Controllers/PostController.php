<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::query()
                ->latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = $this->validatePost();

        $attributes['slug'] = SlugService::createSlug(Post::class, 'slug', $attributes['title'], ['unique' => true]);
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');

        auth()->user()->posts()->create($attributes);

        return redirect('/')->with(['success' => 'The Post has been successfully published!']);
    }

    public function show(Post $post) // $post = Post::where('slug', $post)->firstOrFail()
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        $attributes['slug'] = SlugService::createSlug(Post::class, 'slug', $attributes['title'], ['unique' => true]);

        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect('/')->with(['success' => 'The Post has been updated!']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with(['success' => 'The Post has been deleted!']);
    }

    protected function validatePost(?Post $post = null) : array
    {
        $post ??= new Post();

        return request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => ['required', 'min:3', 'max:255'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
        ]);

    }


}
