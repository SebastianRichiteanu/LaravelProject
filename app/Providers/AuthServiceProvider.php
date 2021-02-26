<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('users-panel',function($user) {
            return $user->hasRole('admin');
        });
        Gate::define('author-panel',function($user) {
            return ($user->hasRole('admin') || $user->hasRole('author'));
        });
        //
    }
}
