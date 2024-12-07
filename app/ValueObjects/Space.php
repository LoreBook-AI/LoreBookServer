<?php

namespace App\ValueObjects;

class Space
{
    private float $meters;
    private int $squares;
    private int $feet;

    public function __construct(float $meters)
    {
        $this->meters = $meters;
        $this->squares = (int) ($meters / 1.5); // Assuming 1 square = 1.5 meters
        $this->feet = (int) ($meters * 3.28084); // Convert meters to feet
    }

    public static function fromMeters(float $meters): self
    {
        return new self($meters);
    }

    public static function fromSquares(int $squares): self
    {
        return new self($squares * 1.5);
    }

    public static function fromFeet(int $feet): self
    {
        return new self($feet / 3.28084);
    }

    public function toArray(): array
    {
        return [
            'meters' => $this->meters,
            'squares' => $this->squares,
            'feet' => $this->feet,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
