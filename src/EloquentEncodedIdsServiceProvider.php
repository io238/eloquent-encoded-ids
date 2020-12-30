<?php

namespace Io238\EloquentEncodedIds;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;


class EloquentEncodedIdsServiceProvider extends ServiceProvider {

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/eloquent-encoded-ids.php' => config_path('eloquent-encoded-ids.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/eloquent-encoded-ids'),
            ], 'views');
        }
    }


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/eloquent-encoded-ids.php', 'eloquent-encoded-ids');

        $this->app->singleton('Hashids\Hashids', function ($app) {
            return new Hashids(
                config('eloquent-encoded-ids.salt'),
                config('eloquent-encoded-ids.length'),
                config('eloquent-encoded-ids.alphabet')
            );
        });

        $this->app->alias('Hashids\Hashids', 'hashids');
    }

}
