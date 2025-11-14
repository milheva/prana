<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define Gate for admin access
        Gate::define('access-admin', function (User $user) {
            return $user->isAdmin();
        });

        // Define Gate for customer access
        Gate::define('access-customer', function (User $user) {
            return $user->isCustomer();
        });

        // Define Gate for viewing any order (admin only)
        Gate::define('viewAny', function (User $user, string $model) {
            return $user->isAdmin();
        });

        // Configure API Rate Limiting
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
