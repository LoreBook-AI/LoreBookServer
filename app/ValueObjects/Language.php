<?php

namespace App\ValueObjects;

use JsonSerializable;

class Language implements JsonSerializable
{
    private string $name;
    private string $description;
    private string $origin;

    private function __construct(string $name, string $description, string $origin)
    {
        $this->name = $name;
        $this->description = $description;
        $this->origin = $origin;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data["name"],
            $data["description"],
            $data["description"]
        );
    }
    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "origin" => $this->origin
        ];
    }

}
