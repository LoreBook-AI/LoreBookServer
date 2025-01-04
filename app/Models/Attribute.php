<?php

namespace App\Models;

use App\ValueObjects\Attribute as AttributeValueObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Attribute extends Model
{
    protected $fillable = [
        'name',
        'description',
        'value',
    ];

    public function proficiencies(): MorphMany
    {
        return $this->morphMany(related: Proficiency::class, name: 'proficienttable');
    }

    public function toValueObject(): AttributeValueObject
    {
        return AttributeValueObject::fromArray(data: [
            "name" => $this->name,
            "description" => $this->description,
            "value" => $this->value
        ]);
    }

}
