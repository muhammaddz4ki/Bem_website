<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Setting; // <-- IMPORT SETTING

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
        // Ambil semua settings sekali saja
        $settings = Setting::pluck('value', 'key');

        // Bagikan Categories ke semua view
        View::share('categories', Category::all());

        // Bagikan path logo (jika ada) ke semua view
        View::share('logoPath', $settings['logo_path'] ?? null);
    }
}
