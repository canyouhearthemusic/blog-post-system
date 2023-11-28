<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
        Gate::define('manage-post', function (User $user, Post $post) {
            return ($user->id === $post->user_id || $user->is_admin)
                ? \Illuminate\Auth\Access\Response::allow()
                : \Illuminate\Auth\Access\Response::deny();
        });
    }
}
