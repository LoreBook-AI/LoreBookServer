<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\ValueObjects\Language as EffectValue;
class Effect extends Model
{
    protected $fillable = [
        "name",
        "description",
        "duration",
        "type",
        "attribute",
        "operator",
        "valueEffect",
    ];

    public function toValueObject(): EffectValue
    {
        return EffectValue::fromArray(data: [
            "name" => $this->name,
            "description" => $this->description,
            "duration" => $this->origin,
            "type" => $this->type,
            "attribute" => $this->attribute,
            "operator" => $this->operator,
            "valueEffect" => $this->valueEffect,
        ]);
    }

}
