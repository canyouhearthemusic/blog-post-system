<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(3)->create();
        $categories = Category::factory(3)->create();

        $posts = Post::factory(20)->create(fn() => [
            'user_id' => $users->random()->id,
            'category_id' => $categories->random()->id,
        ]);

        foreach ($posts as $post) {
            $post->comments = Comment::factory(3)->create(fn() => [
                'post_id' => $post->id,
                'user_id' => $users->random()->id
            ]);
        }
        User::create([
            'name' => "Alibek Tastan",
            'username' => 'al1bek',
            'email' => 'alibektastan04@gmail.com',
            'password' => 'asd123',
            'is_admin' => true
        ]);
    }
}
