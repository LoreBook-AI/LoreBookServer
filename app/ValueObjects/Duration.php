<?php

namespace App\ValueObjects;

use JsonSerializable;
use InvalidArgumentException;

class Duration implements JsonSerializable
{
    private string $type;
    private ?int $seconds;

    const TYPES = [
        'instant',
        'time_span',
        'permanent',
        'undetermined',
        'action',
        'reaction',
        'bonus_action'
    ];

    public function __construct(string $type, ?int $seconds = null)
    {
        if (!in_array($type, self::TYPES)) {
            throw new InvalidArgumentException('Invalid duration type');
        }

        $this->type = $type;
        $this->seconds = $seconds;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['seconds'] ?? null
        );
    }

    public function humanize(): string
    {
        if ($this->type !== 'time_span' || !$this->seconds) {
            return $this->type;
        }

        $hours = floor($this->seconds / 3600);
        $minutes = floor(($this->seconds % 3600) / 60);
        $seconds = $this->seconds % 60;

        $parts = [];
        if ($hours > 0)
            $parts[] = "$hours hour" . ($hours > 1 ? 's' : '');
        if ($minutes > 0)
            $parts[] = "$minutes minute" . ($minutes > 1 ? 's' : '');
        if ($seconds > 0)
            $parts[] = "$seconds second" . ($seconds > 1 ? 's' : '');

        return implode(', ', $parts);
    }

    public function jsonSerialize(): array
    {
        return [
            "type" => $this->type,
            "seconds" => $this->seconds,
            "humanized" => $this->humanize(),
        ];
    }
}
