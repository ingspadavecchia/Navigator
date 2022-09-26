<?php

namespace App\Providers;

use App\Services\InvoiceSummaryService;
use App\Services\InvoiceSummaryServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InvoiceSummaryServiceInterface::class, InvoiceSummaryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
