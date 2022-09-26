<?php

namespace App\Providers;

use App\Services\InvoiceService;
use App\Services\InvoiceServiceInterface;
use App\Services\InvoiceDetailService;
use App\Services\InvoiceDetailServiceInterface;
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
        $this->app->bind(InvoiceServiceInterface::class, InvoiceService::class);
        $this->app->bind(InvoiceDetailServiceInterface::class, InvoiceDetailService::class);
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
