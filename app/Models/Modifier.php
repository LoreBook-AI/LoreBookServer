<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\ValueObjects\Modifier as ModifierValueObject;

class Modifier extends Model
{
    protected $fillable = [
        "advantage_disadvantage",
        "attribute",
        "type",
        "flat_bonus"
    ];

    public function toValueObject(): ModifierValueObject
    {
        return ModifierValueObject::fromArray(data: [
            "advantage_disadvantage" => $this->type,
            "attribute" => $this->attribute ?? null,
            "type" => $this->type,
            "flat_bonus" => $this->attribute,
        ]);
    }

    public function Checkable(): MorphTo
    {
        return $this->morphTo();
    }
}
