<?php

namespace Io238\EloquentEncodedIds;

use Hashids\Hashids;
use Illuminate\Support\Fluent;
use Illuminate\Support\ServiceProvider;


class EncodedIdsProvider extends ServiceProvider {

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/encoded-ids.php' => config_path('encoded-ids.php'),
            ], 'config');
        }
    }


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/encoded-ids.php', 'encoded-ids');

        $this->app->bind(Hashids::class, function ($app, $parameters) {

            // The actual salt is a combination from the config salt + the class name
            // Adding the class name ensures that different models do not share the same encryption salt
            $salt = md5(config('encoded-ids.salt') . (new Fluent($parameters))->class);

            return new Hashids(
                $salt,
                config('encoded-ids.length'),
                config('encoded-ids.alphabet')
            );
        });

        $this->app->alias(Hashids::class, 'hashids');
    }

}
