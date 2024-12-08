<?php

namespace App\Models;

use App\ValueObjects\Attribute as AttributeValueObject;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'description', 'value'];

    public function toValueObject(): AttributeValueObject
    {
        return new AttributeValueObject(
            $this->name,
            $this->description,
            $this->value
        );
    }
}
