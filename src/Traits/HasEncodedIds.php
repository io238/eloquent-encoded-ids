<?php

namespace Io238\EloquentEncodedIds\Traits;

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

        $encodedId = app('hashids', ['class' => get_class()])->encode($this->getKey());

        return join(
            config('encoded-ids.separator', '_'),
            array_filter([
                config('encoded-ids.prefix') ? static::getRouteKeyPrefix() : null,
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
        if (config('encoded-ids.case-insensitive')) {
            $value = strtolower($value);
        }

        // Ignore prefix, if any
        $value = Str::of($value)->explode(config('encoded-ids.separator', '_'))->last();

        // Convert encoded (Hashid) to numeric ID (integer)
        $decodedId = rescue(fn() => app('hashids', ['class' => get_class()])->decode($value)[0]);

        // Resolve the model
        return $this->where($field ?? $this->getRouteKeyName(), $decodedId)->first();
    }

}
