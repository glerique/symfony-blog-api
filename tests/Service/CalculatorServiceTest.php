<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\CalculatorService;
use PHPUnit\Framework\TestCase;

class CalculatorServiceTest extends TestCase
{
    private CalculatorService $calculator;

    protected function setUp(): void
    {
        $this->calculator = new CalculatorService();
    }

    public function testAdd(): void
    {
        $result = $this->calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testMultiply(): void
    {
        $result = $this->calculator->multiply(4, 5);
        $this->assertEquals(20, $result);
    }

    public function testDivide(): void
    {
        $result = $this->calculator->divide(10, 2);
        $this->assertEquals(5.0, $result);
    }

    public function testDivideByZeroThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero is not allowed');

        $this->calculator->divide(10, 0);
    }
}
