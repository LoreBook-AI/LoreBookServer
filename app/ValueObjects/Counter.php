<?php

namespace App\ValueObjects;

use JsonSerializable;

class Counter implements JsonSerializable
{
    private int $max;
    private int $current;
    private array $triggers;

    public function __construct(int $max, array $triggers = [])
    {
        $this->max = $max;
        $this->current = $max;
        $this->triggers = $triggers;
    }

    public function increment(): void
    {
        $this->add(1);
    }

    public function decrement(): void
    {
        $this->add(-1);
    }

    public function add(int $value): void
    {
        $this->current = min($this->max, max(0, $this->current + $value));
    }

    public function reset(): void
    {
        $this->current = $this->max;
    }

    public function getCurrent(): int
    {
        return $this->current;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function getTriggers(): array
    {
        return $this->triggers;
    }

    public function jsonSerialize(): array
    {
        return [
            'max' => $this->max,
            'current' => $this->current,
            'triggers' => $this->triggers,
        ];
    }

    public static function fromArray(array $data): self
    {
        $counter = new self($data['max'], $data['triggers'] ?? []);
        $counter->current = $data['current'];
        return $counter;
    }
}
