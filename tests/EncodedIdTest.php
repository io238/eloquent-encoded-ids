<?php

use Io238\EloquentEncodedIds\Tests\Support\TestModel;


beforeEach(function () {
    $this->testModel = TestModel::create(['name' => 'Test']);
});

it('persists the test model in the DB', function () {

    expect($this->testModel->getKey())->toBe(1);

});

it('encodes the route key', function () {

    expect($this->testModel->getRouteKey())->toBe('tm_m7vx7');

});

it('resolves the model with the route key', function () {

    $resolvedModel = TestModel::first()->resolveRouteBinding('tm_m7vx7');

    expect($resolvedModel->id)->toBe($this->testModel->id);

});