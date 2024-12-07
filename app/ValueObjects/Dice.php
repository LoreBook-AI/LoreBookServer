<?php

namespace App\ValueObjects;

use JsonSerializable;

class Dice implements JsonSerializable
{
    private int $amount;
    private int $dice;

    public function __construct(int $amount, int $dice)
    {
        $this->amount = $amount;
        $this->dice = $dice;
    }

    public function roll(): int
    {
        $roll = 0;
        for ($i = 0; $i < $this->amount; $i++) {
            $roll += random_int(1, $this->dice);
        }
        return $roll;
    }

    public function __tostring(): string
    {
        return $this->amount . "d" . $this->dice;
    }

    public function jsonSerialize(): array
    {
        return [
            "amount" => $this->amount,
            "dice" => $this->dice
        ];
    }

}
