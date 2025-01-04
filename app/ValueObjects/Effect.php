<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\Hash;
use JsonSerializable;

class Effect implements JsonSerializable
{
    private const array OPERATORS = [
        '+',
        '-',
        '/',
        '*',
    ];
    private string $name;
    private string $description;
    private Duration $duration;
    private string $type;
    private Attribute $attribute;
    private string $operator;
    private float $valueEffect;

    public function __construct(
        string $name,
        string $description,
        Duration $duration,
        string $type,
        Attribute $attribute,
        string $operator,
        float $valueEffect
    ) {
        $this->nome = $name;
        $this->description = $description;
        $this->duration = $duration;
        $this->type = $type;
        $this->attribute = $attribute;
        if (!in_array(needle: $operator, haystack: self::OPERATORS)) {
            throw new \InvalidArgumentException(message: 'Invalid operator Type');
        }
        $this->operator = $operator;
        $this->valueEffect = $valueEffect;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            type: $data['type'],
            description: $data['description'],
            duration: Duration::fromArray(data: $data['duration']),
            attribute: $data['attribute'],
            operator: $data['operator'],
            valueEffect: $data['valueEffect'],
        );
    }

    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "duration" => $this->duration,
            "type" => $this->type,
            "attribute" => $this->attribute,
            "operator" => $this->operator,
            "valueEffect" => $this->valueEffect,
        ];
    }
}
