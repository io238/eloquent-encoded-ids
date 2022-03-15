<?php

namespace Io238\EloquentEncodedIds\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Io238\EloquentEncodedIds\EncodedIdsProvider;
use Orchestra\Testbench\TestCase as Orchestra;


class TestCase extends Orchestra {

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }


    protected function getPackageProviders($app)
    {
        return [
            EncodedIdsProvider::class,
        ];
    }


    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
        ]);
    }


    public function setUpDatabase()
    {
        Schema::create('test_models', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
        });

        Schema::create('other_test_models', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
        });
    }

}
