<?php

namespace App\Models;

use App\ValueObjects\Language as LanguageValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Language extends Model
{
    protected $fillable = [
        "name",
        "description",
        "origin",
    ];

    public function proficiencies(): MorphMany
    {
        return $this->morphMany(related: Proficiency::class, name: 'proficienttable');
    }

    public function toValueObject(): LanguageValue
    {
        return LanguageValue::fromArray(data: [
            "name" => $this->name,
            "description" => $this->description,
            "origin" => $this->origin
        ]);
    }
}
