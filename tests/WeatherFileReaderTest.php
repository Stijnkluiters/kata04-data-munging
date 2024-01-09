<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class WeatherFileReaderTest extends TestCase
{
    private WeatherFileReader $weatherFileReader;

    protected function setUp(): void
    {
        $this->weatherFileReader = new WeatherFileReader();
    }

    public function testRetrieveWeatherData(): void
    {
        $weatherModels = $this->weatherFileReader->retrieveWeatherData();

        $this->assertIsArray($weatherModels);
        $this->assertNotEmpty($weatherModels);

        foreach ($weatherModels as $weatherModel) {
            $this->assertInstanceOf(WeatherModel::class, $weatherModel);
        }
    }

    public function testRetrieveWeatherDataAndCheckIfTheValuesAreAsExpected(): void
    {
        $result = $this->weatherFileReader->retrieveWeatherData();

        $this->assertIsArray($result);

        $this->assertInstanceOf(WeatherModel::class, $result[0]);

        $this->assertSame(1, $result[0]->getDay());
        $this->assertSame(59, $result[0]->getMinTempSpread());
        $this->assertSame(88, $result[0]->getMaxTempSpread());
    }
}
