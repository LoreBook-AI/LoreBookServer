<?php

namespace App\Casts;

use App\ValueObjects\Space;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class SpaceCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): Space
    {
        return $value ? Space::fromMeters((float) $value) : null;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value instanceof Space ? $value->getMeters() : $value;
    }
}
