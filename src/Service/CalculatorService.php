<?php

declare(strict_types=1);

namespace App\Service;

class CalculatorService
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    public function divide(int $a, int $b): float
    {
        if (0 === $b) {
            throw new \InvalidArgumentException('Division by zero is not allowed');
        }

        return $a / $b;
    }
}
