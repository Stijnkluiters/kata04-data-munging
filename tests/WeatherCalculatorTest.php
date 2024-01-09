<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class WeatherCalculatorTest extends TestCase
{
    private WeatherCalculator $weatherCalculator;

    protected function setUp(): void
    {
        $this->weatherCalculator = new WeatherCalculator();
    }

    public function testRetrieveColdestDay(): void
    {
        $weatherModels = $this->weatherCalculator->getColdestDay();

        $this->assertEquals(32, $weatherModels->getMinTempSpread());
    }
}
