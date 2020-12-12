<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-users', function ($user){
            return $user-> hasRole('admin');
        });
        Gate::define('delete-users', function ($user){
            return $user-> hasRole('admin');
        });
        Gate::define('manage-users', function ($user){
            return $user-> hasRole('admin');
        });


        Gate::define('manage-info', function ($user){
            return $user-> hasRole('admin');
        });

        Gate::define('shop-user', function ($user){
            return $user-> hasRole('user') || $user-> hasRole('trainer') ;
        });
        Gate::define('shop-admin', function ($user){
            return $user-> hasRole('admin');
        });
        Gate::define('shop-all', function ($user){
            return $user-> hasRole('admin') || $user-> hasRole('user') || $user-> hasRole('trainer');
        });
        Gate::define('create-visit', function ($user) {
            return $user->hasRole('user');
        });
        Gate::define('manage-Training', function ($user){
            return ($user-> hasRole('trainer') || $user-> hasRole('admin'));
        });
    }
}
