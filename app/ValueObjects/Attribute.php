<?php

namespace App\ValueObjects;

use JsonSerializable;

class Attribute implements JsonSerializable
{
    private string $name;
    private string $description;
    private int $value;

    private function __construct(string $name, string $description, int $value = 10)
    {
        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['description'],
            $data['value'] ?? 10
        );
    }

    public function getBonus(): int
    {
        return floor(($this->value - 10) / 2);
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value,
            'bonus' => $this->getBonus()
        ];
    }
}
