<?php

namespace Io238\EloquentEncodedIds\Tests\Support;

use Illuminate\Database\Eloquent\Model;
use Io238\EloquentEncodedIds\Traits\HasEncodedIds;


class OtherTestModel extends Model {

    use HasEncodedIds;


    protected $guarded = [];

    public $timestamps = false;

}