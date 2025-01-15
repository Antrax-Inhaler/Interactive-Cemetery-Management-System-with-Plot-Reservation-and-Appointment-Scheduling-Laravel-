<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\LandingPage;
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
    public function boot()
    {
        // Sharing the $landingPage variable globally
        View::composer('*', function ($view) {
            $landingPage = LandingPage::find(1); // Assuming there is only one landing page
            $view->with('landingPage', $landingPage);
        });
    }
}
