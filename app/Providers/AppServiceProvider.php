<?php

namespace App\Providers;

use App\Models\DetailCategory;
use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('app.nav', function (View $view) {
            $detail_categories = DetailCategory::withCount('details')
                ->orderBy('name')
                ->get();

            $services = Service::orderBy('name')
                ->get();

            $view->with([
                'detail_categories ' => $detail_categories,
                'services' => $services,
            ]);
        });
    }
}
