<?php

namespace Io238\EloquentEncodedIds\Traits;

use Exception;
use Illuminate\Support\Facades\App;
use RuntimeException;


trait HasEncodedIds {

    public function getRouteKey()
    {
        $key = $this->getKey();

        if ( ! $this->getKey()) {
            return $this->getKey();
        }

        if ($this->getKeyType() === 'int' && (ctype_digit($key) || is_int($key))) {
            $encodedId = App::make('hashids')->encode($key);
            if (property_exists($this, 'idPrefix')) {
                return implode(config('eloquent-encoded-ids.separator'), [static::$idPrefix, $encodedId]);
            }
            else return $encodedId;
        }
        else {
            throw new RuntimeException('Key should be of type int to encode it.');
        }

    }


    public function getEncodedIdAttribute()
    {
        return $this->getRouteKey();
    }


    public function resolveRouteBinding($value, $field = null)
    {
        try {
            $value = collect(explode(config('eloquent-encoded-ids.separator'), $value))->last();
            $decodedId = collect(App::make('hashids')->decode($value))->first();
        } catch (Exception $e) {
            return null;
        }

        return $this->where($field ?? $this->getRouteKeyName(), $decodedId)->first();
    }

}
