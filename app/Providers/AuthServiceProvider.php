<?php

namespace App\Providers;

use App\Models\User;
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

        Gate::define("Admin", function(User $user){
            return $user->hasRole("Admin");
        });

        Gate::define("manager", function(User $user){
            return $user->hasRole("manager");
        });

        Gate::define("employe", function(User $user){
            return $user->hasAnyRoles(["employe","manager"]);
        });

        Gate::before(function (User $user) {
           return $user->hasRole("superadmin");
         
            
        });
        
    }

}