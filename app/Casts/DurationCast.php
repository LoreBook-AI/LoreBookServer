<?php

namespace App\Casts;

use App\ValueObjects\Duration;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class DurationCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        if ($value === null)
            return null;

        $duration = json_decode($value, true);
        return Duration::fromArray($duration);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if ($value === null)
            return null;

        if (!$value instanceof Duration) {
            throw new InvalidArgumentException('The given value is not a Duration instance.');
        }

        return json_encode($value);
    }
}
