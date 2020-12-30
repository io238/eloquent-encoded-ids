<?php

namespace Io238\EloquentEncodedIds;

use Illuminate\Support\ServiceProvider;
use Io238\EloquentEncodedIds\Commands\EloquentEncodedIdsCommand;

class EloquentEncodedIdsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/eloquent-encoded-ids.php' => config_path('eloquent-encoded-ids.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/eloquent-encoded-ids'),
            ], 'views');

            $migrationFileName = 'create_eloquent_encoded_ids_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                EloquentEncodedIdsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'eloquent-encoded-ids');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/eloquent-encoded-ids.php', 'eloquent-encoded-ids');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
