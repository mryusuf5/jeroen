<?php

namespace App\Providers;

use App\Models\contactMessages;
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
        view()->composer("components.admin-layout", function($view){
            $view->with("contact_messages", contactMessages::orderBy("created_at", "DESC")->get());
        });
    }
}
