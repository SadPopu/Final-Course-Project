<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Nos pedidos, os url()/asset() seguem o endereço e o prefixo enviados pelo proxy
        // (X-Forwarded-Host/Proto/Prefix, ver TrustProxies), por isso funcionam em popu.pt e em localhost.
        // Fora de pedidos (consola) usa o APP_URL, que pode incluir o path (ex.: https://popu.pt/agrishop).
        if ($this->app->runningInConsole()) {
            $appUrl = rtrim((string) config('app.url'), '/');
            if ($appUrl !== '') {
                URL::forceRootUrl($appUrl);
            }
        }
    }
}
