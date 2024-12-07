<?php

namespace App\ValueObjects;

use JsonSerializable;

class SpellSlot implements JsonSerializable
{
    private Counter $counter;
    private int $level;
    private string $school;
    private string $origin;
    private string $type;

    public function __construct(
        int $max,
        int $level,
        string $school,
        string $origin,
        string $type,
        array $triggers = []
    ) {
        $this->counter = new Counter($max, $triggers);
        $this->level = $level;
        $this->school = $school;
        $this->origin = $origin;
        $this->type = $type;
    }

    // Delegate counter methods
    public function increment(): void
    {
        $this->counter->increment();
    }

    public function decrement(): void
    {
        $this->counter->decrement();
    }

    public function add(int $value): void
    {
        $this->counter->add($value);
    }

    public function reset(): void
    {
        $this->counter->reset();
    }

    public function jsonSerialize(): array
    {
        return [
            'counter' => $this->counter,
            'level' => $this->level,
            'school' => $this->school,
            'origin' => $this->origin,
            'type' => $this->type
        ];
    }

    public static function fromArray(array $data): self
    {
        $counter = $data['counter'];
        return new self(
            $counter['max'],
            $data['level'],
            $data['school'],
            $data['origin'],
            $data['type'],
            $counter['triggers'] ?? []
        );
    }
}
