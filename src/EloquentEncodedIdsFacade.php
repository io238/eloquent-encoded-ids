<?php

namespace Io238\EloquentEncodedIds;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Io238\EloquentEncodedIds\EloquentEncodedIds
 */
class EloquentEncodedIdsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'eloquent-encoded-ids';
    }
}
