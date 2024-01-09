<?php

class WeatherCalculator
{
    public function getColdestDay(): WeatherModel
    {
        $weatherFileReader = new WeatherFileReader();

        $weathers = $weatherFileReader->retrieveWeatherData();
        usort($weathers, function (WeatherModel $weatherA, WeatherModel $weatherB) {
            return $weatherA->getMinTempSpread() > $weatherB->getMinTempSpread();
        });
        var_dump($weathers);

        return $weathers[0];
    }
}
