<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
    // In AppServiceProvider.php

public function boot()
{
    View::composer('*', function ($view) {
        $view->with('darkModeToggle', true);
    });
}

}
