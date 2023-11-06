<?php

namespace App\Providers;

use App\Models\CarBrand;
use App\Models\CarSerie;
use App\Models\DetailCategory;
use App\Models\Location;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        Model::preventLazyLoading(! app()->isProduction());
        Paginator::useBootstrapFive();

        Facades\View::composer('app.nav', function (View $view) {
            $detail_categories = DetailCategory::withCount('details')
                ->orderBy('name')
                ->get();

            $services = Service::orderBy('name')
                ->get();

            $client = auth()->user();

            $view->with([
                'detail_categories' => $detail_categories,
                'services' => $services,
                'client' => $client,
            ]);
        });

        Facades\View::composer('app.filter', function (View $view) {

        });
    }
}
