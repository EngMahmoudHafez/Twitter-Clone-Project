<?php

namespace App\Providers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();

        Debugbar::enable();
        $topusers = Cache::remember("topusers", now()->addHours(3)->addMinutes(30), function () {
            return User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->limit(6)
                ->get();
        });

        // Cache::flush(); //the hole cache
        // Cache::forget('key');; //the one  cache
        View::share(
            'topusers',
            $topusers
        );
    }
}
