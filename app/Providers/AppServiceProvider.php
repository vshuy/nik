<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        DB::listen(function ($query) {
            Log::info('----------------Start query change----------------------');
            Log::info(json_encode([
                $query->sql,
                $query->bindings,
                $query->time,
            ]));
            Log::info('------------------End query log---------------------------');
        });
    }
}
