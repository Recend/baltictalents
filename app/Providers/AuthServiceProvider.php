<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\File;
use App\Models\Group;
use App\Models\Group_User;
use App\Models\User;
use App\Policies\GroupPolicy;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Group::class => GroupPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create', function (User $user){
                return $user->role == 'teacher';
        });

        Gate::define('view', function (User $user, Group_User $students, Group $group){
                if ($students->user_id == $group->user_id){
                    return true;
                }
        });
        //
    }
}
