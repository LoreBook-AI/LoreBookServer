<?php

namespace App\ValueObjects;

use JsonSerializable;
use InvalidArgumentException;

class Modifier implements JsonSerializable
{
    private string $advantage_disadvantage;
    private Attribute $attribute;
    private string $type;
    private int $flat_bonus;

    const ADVANTAGE_TYPES = [
        'normal',
        'advantage',
        'disadvantage'
    ];

    public function __construct(
        string $advantage_disadvantage,
        ?Attribute $attribute = null,
        int $flat_bonus,
        string $type
    ) {
        if (!in_array($advantage_disadvantage, self::ADVANTAGE_TYPES)) {
            throw new InvalidArgumentException('Invalid advantage/disadvantage type');
        }
        $morphMap = Check::$morphMap ?? [];
        if (!in_array($type, array_keys($morphMap))) {
            throw new InvalidArgumentException('Invalid checkable type');
        }
        $this->type = $type;
        $this->flat_bonus = $flat_bonus;
        $this->advantage_disadvantage = $advantage_disadvantage;
        $this->attribute = $attribute ?? null;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            advantage_disadvantage: $data['advantage_disadvantage'],
            attribute: Attribute::fromArray(data: $data['attribute']),
            type: $data['type'],
            flat_bonus: $data['flat_bonus'],
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'advantage_disadvantage' => $this->advantage_disadvantage,
            'attribute' => $this->attribute->jsonSerialize(),
            'type' => $this->type,
        ];
    }
}
