<?php

namespace Io238\EloquentEncodedIds\Traits;

use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use RuntimeException;


trait HasEncodedIds {

    public function getRouteKey()
    {
        if ( ! $this->getKey() || $this->getKeyType() !== 'int') {
            return $this->getKey();
        }

        if ( ! ctype_digit((string) $this->getKey())) {
            throw new RuntimeException('Key should be of type integer to encode it.');
        }

        $encodedId = App::make('hashids')->encode($this->getKey());

        return join(
            config('eloquent-encoded-ids.separator'),
            array_filter([
                static::getRouteKeyPrefix(),
                $encodedId,
            ])
        );
    }


    static public function getRouteKeyPrefix(): string|null
    {
        return (new static)->prefix ??
            Str::of(get_class())->afterLast('\\')
                ->kebab()
                ->explode('-')
                ->map(fn($str) => $str[0])
                ->join('');
    }


    public function getEncodedIdAttribute()
    {
        return $this->getRouteKey();
    }


    public function resolveRouteBinding($value, $field = null)
    {
        try {

            $value = Str::of($value)->explode(config('eloquent-encoded-ids.separator'))->last();

            $decodedId = collect(App::make('hashids')->decode($value))->first();

        } catch (Exception) {
            return null;
        }

        return $this->where($field ?? $this->getRouteKeyName(), $decodedId)->first();
    }

}
