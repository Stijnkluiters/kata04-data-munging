<?php

class WeatherModel
{
    public function __construct(
        private int $day,
        private int $minTempSpread,
        private int $maxTempSpread
    ) {
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMinTempSpread(): int
    {
        return $this->minTempSpread;
    }

    public function getMaxTempSpread(): int
    {
        return $this->maxTempSpread;
    }
}
