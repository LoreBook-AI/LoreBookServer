<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\ValueObjects\Check as CheckValueObject;

class Check extends Model
{
    protected $fillable = [
        "type",
    ];

    public function toValueObject(): CheckValueObject
    {
        return CheckValueObject::fromArray(data: [
            "type" => $this->type,
        ]);
    }

    public function Checkable(): MorphTo
    {
        return $this->morphTo();
    }
}
