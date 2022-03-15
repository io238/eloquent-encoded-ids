<?php

use Io238\EloquentEncodedIds\Tests\Support\OtherTestModel;
use Io238\EloquentEncodedIds\Tests\Support\TestModel;


beforeEach(function () {
    $this->testModel = TestModel::create(['name' => 'Test']);
    $this->otherTestModel = OtherTestModel::create(['name' => 'Test']);
});

it('persists the test models in the DB', function () {

    expect($this->testModel->getKey())->toBe(1);

    expect($this->otherTestModel->getKey())->toBe(1);

});

it('encodes the route key', function () {

    expect($this->testModel->getRouteKey())->toBe('tm_m7vx7');

});

it('resolves the model with the route key (incl. prefix)', function () {

    $resolvedModel = TestModel::first()->resolveRouteBinding('tm_m7vx7');

    expect($resolvedModel->id)->toBe($this->testModel->id);

});

it('resolves the model with the route key (excl. prefix)', function () {

    $resolvedModel = TestModel::first()->resolveRouteBinding('m7vx7');

    expect($resolvedModel->id)->toBe($this->testModel->id);

});

it('does not include a prefix', function () {

    config()->set('encoded-ids.prefix', false);

    expect($this->testModel->getRouteKey())->not()->toContain(config('encoded-ids.separator'));

});

it('has the configured minimum length', function () {

    $minSize = 10;

    config()->set('encoded-ids.prefix', false);
    config()->set('encoded-ids.length', $minSize);

    expect(strlen($this->testModel->getRouteKey()))->toBeGreaterThanOrEqual($minSize);

});

it('does generate distinctive encoded IDs for the same numeric ID on different models', function () {

    expect(TestModel::find(1)->getKey())->toBe(OtherTestModel::find(1)->getKey());

    expect(TestModel::find(1)->getRouteKey())->not()->toBe(OtherTestModel::find(1)->getRouteKey());

});

it('ignores the case of the encoding alphabet', function () {

    config()->set('encoded-ids.case-insensitive', true);

    expect(TestModel::first()->resolveRouteBinding('M7VX7')->id)->toBe($this->testModel->id);

});


it('honors the case of the encoding alphabet', function () {

    config()->set('encoded-ids.case-insensitive', false);

    expect(TestModel::first()->resolveRouteBinding('M7VX7'))->toBeNull();

});