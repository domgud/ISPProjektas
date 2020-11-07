<?php

namespace App\Providers;

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
        Gate::define('shop-user', function ($user){
            return $user-> hasRole('user') || $user-> hasRole('trainer') ;
        });
        Gate::define('shop-admin', function ($user){
            return $user-> hasRole('admin');
        });
        Gate::define('shop-all', function ($user){
            return $user-> hasRole('admin') || $user-> hasRole('user') || $user-> hasRole('trainer');
        });
    }
}
