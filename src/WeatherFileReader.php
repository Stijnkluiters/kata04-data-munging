<?php

class WeatherFileReader
{
    public function retrieveWeatherData(): array
    {
        $file = file('../src/weather.dat');
        $weatherModels = [];
        if ($file === false) {
            throw new InvalidArgumentException('weather.dat not found');
        }
        foreach ($file as $fileLine) {
            $exploded = explode('  ', $fileLine);
            $filtered = array_map('trim', $exploded);
            $filtered = array_filter($filtered, function ($value) {
                return !empty($value);
            });
            if (!is_numeric($filtered[1])) {
                continue;
            }
            if (null === $filtered[4] || null === $filtered[2] || null === $filtered[1]) {
                continue;
            }
            $weatherModels[] = new WeatherModel(
                (int) $filtered[1],
                (int) $filtered[4],
                (int) $filtered[2]
            );
        }

        return $weatherModels;
    }
}
