<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Ticket;
use App\Policies\TicketPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Ticket::class => TicketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /* define an administrator user role */
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        /* define an author user role */
        Gate::define('isAuthor', function ($user) {
            return $user->role == 'author';
        });
        /* define a user role */
        Gate::define('isUser', function ($user) {
            return $user->role == 'attendee';
        });
        
        

        //
    }
}
