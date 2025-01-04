<?php

namespace App\ValueObjects;

use JsonSerializable;
use InvalidArgumentException;

class Check implements JsonSerializable
{
    private string $type;

    const array TYPES = [
        'Ability Checks',
        'Saving Throws',
        'Skill Checks',
    ];

    public function __construct(string $type)
    {
        if (!in_array(needle: $type, haystack: self::TYPES)) {
            throw new InvalidArgumentException('Invalid check type');
        }

        $this->type = $type;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
        );
    }

    public function jsonSerialize(): array
    {
        return [
            "type" => $this->type,
        ];
    }
}
